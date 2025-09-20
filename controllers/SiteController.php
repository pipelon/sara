<?php

namespace app\controllers;

use app\models\SaraSearchHistory;
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

    public function actionSara()
    {

        $model = new \app\models\SaraSearch();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // Guardar la búsqueda solo si  presionaron el boton Buscar y Guardar
            $action = Yii::$app->request->post('action');

            if ($action === 'search_and_save') {
                $history = new SaraSearchHistory();
                $history->created_by = Yii::$app->user->identity->username;
                $history->created = date('Y-m-d H:i:s');
                $history->nombre_yegua = $model->form['nombre_yegua'] ?? '';
                $history->gait_id = $model->form['gait_id'] ?? null;
                $history->variables = json_encode($model->variables);
                $history->chk = json_encode($model->chk);
                $history->save();
            }

            // Solo quedarte con sliders que además tengan su check seleccionado
            $selected = [];
            foreach ($model->chk as $chkId) {
                $key = str_replace('chk-', '', $chkId); // ej: "tamano-y-forma-corporal-figura"
                if (isset($model->variables[$key])) {
                    $selected[$key] = $model->variables[$key];
                }
            }
            var_dump($selected);
            var_dump($model);
            
        }

        return $this->render('sara', [
            'model' => $model,
        ]);
    }

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
