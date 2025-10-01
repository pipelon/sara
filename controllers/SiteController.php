<?php

namespace app\controllers;

use app\components\RuleEngine;
use app\models\Equines;
use app\models\Gaits;
use app\models\SaraSearchHistory;
use app\models\Subcategories;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Summary of actionSara
     * @return string
     */
    public function actionSara()
    {

        $model = new \app\models\SaraSearch();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // Guardar la búsqueda solo si  presionaron el boton Buscar y Guardar
            $action = Yii::$app->request->post('action');

            if ($action === 'search_and_save') {
                $this->saveSearchHistory($model);
            }

            // Solo quedarte con sliders que además tengan su check seleccionado
            [$variables, $improveKeys, $gaitId, $gaitName] = $this->extractVariables($model);

            // Sara Rules
            $engine = new RuleEngine();
            // Sara variables in Ids
            $slugMap = $this->buildSlugMap();

            $query = Equines::find()->alias('e')
                ->where([
                    'e.active' => 1,
                    'e.gender' => 'Macho',
                    'e.gait_id' => $gaitId
                ]);

            // Aplicar condiciones al query
            $this->applyConditions($query, $engine, $gaitName, $variables, $improveKeys, $slugMap);

            //echo "<pre>";echo ($query->createCommand()->getRawSql()); echo "</pre>";
            $results = $query->all();

            [$orderedSubs, $horseValues, $reverseSlugMap] = $this->getDataResultView($slugMap, $improveKeys, $results);

            return $this->render('sara', [
                'model' => $model,
                'results' => $results,
                'variables' => $variables,
                'gaitName' => $gaitName,
                'engine' => $engine,
                'orderedSubs' => $orderedSubs,
                'horseValues' => $horseValues,
                'reverseSlugMap' => $reverseSlugMap,
                'slugMap' => $slugMap
            ]);

        }

        return $this->render('sara', [
            'model' => $model,
        ]);
    }

    /**
     * applyConditions
     * @param mixed $query
     * @param \app\components\RuleEngine $engine
     * @param string $gaitName
     * @param array $variables
     * @param array $improveKeys
     * @param array $slugMap
     * @return void
     */
    private function applyConditions(
        $query,
        RuleEngine $engine,
        string $gaitName,
        array $variables,
        array $improveKeys,
        array $slugMap
    ): void {
        foreach ($improveKeys as $chkId) {
            $key = str_replace('chk-', '', $chkId);

            if (!isset($variables[$key])) {
                continue;
            }

            $allowed = $engine->getAllowedValues($key, $gaitName, $variables);
            if (empty($allowed)) {
                continue;
            }

            $isComposite = isset($allowed[0])
                && is_array($allowed[0])
                && count(
                    array_diff(array_keys($allowed[0]), ['variable_id', 'equal'])
                ) > 0;

            // Caso compuesto
            if ($isComposite) {
                $or = ['or'];
                foreach ($allowed as $pair) {
                    $and = ['and'];
                    $skipPair = false;
                    foreach ($pair as $subSlug => $val) {
                        if (!isset($slugMap[$subSlug])) {
                            $skipPair = true;
                            break;
                        }
                        $subId = $slugMap[$subSlug];

                        $subQ = (new \yii\db\Query())
                            ->select(new \yii\db\Expression('1'))
                            ->from('equine_variable_values ev')
                            ->innerJoin('variables v', 'v.id = ev.variable_id')
                            ->where('ev.equine_id = e.id')
                            ->andWhere([
                                'ev.subcategory_id' => $subId,
                                'v.value' => $val
                            ]);

                        $and[] = ['exists', $subQ];
                    }
                    if (!$skipPair) {
                        $or[] = $and;
                    }
                }
                // si quedó solo ['or'] (ningún pair válido) => skip
                if (count($or) > 1) {
                    $query->andWhere($or);
                }
            } else {

                if (!isset($slugMap[$key])) {
                    continue;
                }
                $subcategoryId = $slugMap[$key];
                $varValues = $allowed[0]['variable_id'] ?? $allowed['variable_id'] ?? [];
                $subQ = (new \yii\db\Query())
                    ->select(new \yii\db\Expression('1'))
                    ->from('equine_variable_values ev')
                    ->innerJoin('variables v', 'v.id = ev.variable_id')
                    ->where('ev.equine_id = e.id')
                    ->andWhere([
                        'ev.subcategory_id' => $subcategoryId,
                        'v.value' => $varValues   // 🔹 filtramos por value
                    ]);
                $query->andWhere(['exists', $subQ]);
            }
        }
    }

    /**
     * Summary of getDataResultView
     * @param mixed $slugMap
     * @param mixed $improveKeys
     * @param mixed $results
     * @return array<array|null>
     */
    private function getDataResultView($slugMap, $improveKeys, $results)
    {
        $reverseSlugMap = array_flip($slugMap);

        // traer solo subcategorías seleccionadas (excluyendo compuestas)
        $selectedIds = [];
        foreach ($improveKeys as $slug) {
            if ($slug !== 'dorso_cruz' && isset($slugMap[$slug])) {
                $selectedIds[] = $slugMap[$slug];
            }
        }

        $subs = Subcategories::find()
            ->where(['id' => $selectedIds])
            ->indexBy('id')
            ->all();

        // mantener orden original de $improveKeys
        $orderedSubs = [];
        foreach ($improveKeys as $slug) {
            if ($slug === 'dorso_cruz') {
                $orderedSubs[] = ['type' => 'composite', 'slug' => 'dorso_cruz'];
                continue;
            }
            if (isset($slugMap[$slug]) && isset($subs[$slugMap[$slug]])) {
                $orderedSubs[] = ['type' => 'single', 'slug' => $slug, 'sub' => $subs[$slugMap[$slug]]];
            }
        }

        // mapa: [ horseId => [ subcategoryId => EquineVariableValues ] ]
        $horseValues = [];
        foreach ($results as $horse) {
            $map = [];
            foreach ($horse->variableValues as $ev) {
                $map[$ev->subcategory_id] = $ev;
            }
            $horseValues[$horse->id] = $map;
        }

        return [$orderedSubs, $horseValues, $reverseSlugMap];
    }

    /**
     * Summary of buildSlugMap
     * @return int[]
     */
    private function buildSlugMap(): array
    {
        $slugMap = [];
        $subs = Subcategories::find()
            ->alias('s')
            ->joinWith('category c')
            ->where(['s.active' => 1, 'c.active' => 1])
            ->all();

        foreach ($subs as $s) {
            $slug = Yii::$app->utils->slugify($s->category->name) . '-' . Yii::$app->utils->slugify($s->name);
            $slugMap[$slug] = $s->id;
        }

        return $slugMap;
    }

    /**
     * Summary of saveSearchHistory
     * @param mixed $model
     * @return void
     */
    private function saveSearchHistory($model): void
    {

        $variables = array_filter($model->variables, function ($value) {
            return $value !== null && $value !== '';
        });
        $history = new SaraSearchHistory();
        $history->created_by = Yii::$app->user->identity->username;
        $history->created = date('Y-m-d H:i:s');
        $history->nombre_yegua = $model->form['nombre_yegua'] ?? '';
        $history->gait_id = $model->form['gait_id'] ?? null;
        $history->variables = json_encode($variables);
        $history->chk = json_encode($model->chk);
        $history->save();
    }

    /**
     * Summary of extractVariables
     * @param mixed $model
     * @return array<array|int|string>
     */
    private function extractVariables($model): array
    {
        $variables = $improveKeys = [];
        $boolDorsoCruz = false;
        foreach ($model->chk as $chkId) {
            $key = str_replace('chk-', '', $chkId); // ej: "tamano-y-forma-corporal-figura"

            // Caso especial: cruz + dorso
            if (in_array($key, ['linea-superior-cruz', 'linea-superior-tamano-dorso'])) {
                if (!$boolDorsoCruz) {
                    $variables['dorso_cruz'] = [
                        'linea-superior-cruz' => $model->variables['linea-superior-cruz'] ?? null,
                        'linea-superior-tamano-dorso' => $model->variables['linea-superior-tamano-dorso'] ?? null,
                    ];
                    $improveKeys[] = 'dorso_cruz';
                    $boolDorsoCruz = true;
                }
                continue;
            }

            if (isset($model->variables[$key])) {
                $variables[$key] = $model->variables[$key];
                $improveKeys[] = $key;
            }
        }

        $mareData = $model->form;
        $gait = Gaits::findOne($mareData['gait_id']);
        $gaitName = strtolower(str_replace(' ', '-', $gait->name));

        return [$variables, $improveKeys, $gait->id, $gaitName];
    }

    /**
     * Summary of actionLoadHistory
     * @param mixed $id
     * @return Yii\web\Response
     */
    public function actionLoadHistory($id)
    {
        $history = SaraSearchHistory::findOne($id);
        if (!$history) {
            return $this->asJson(['success' => false]);
        }

        return $this->asJson([
            'success' => true,
            'form' => [
                'nombre_yegua' => $history->nombre_yegua,
                'gait_id' => $history->gait_id,
            ],
            'variables' => json_decode($history->variables, true),
            'chk' => json_decode($history->chk, true),
        ]);
    }

}
