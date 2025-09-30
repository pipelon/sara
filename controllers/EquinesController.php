<?php

namespace app\controllers;

use Yii;
use app\models\Equines;
use app\models\EquinesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EquinesController implements the CRUD actions for Equines model.
 */
class EquinesController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Equines models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquinesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Equines model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Equines model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Equines();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // SI ME SUBIERON UNA IMAGEN DEL PRODUCTO
            $model->image_ppal = \yii\web\UploadedFile::getInstance($model, 'image_ppal');
            if (!is_null($model->image_ppal)) {
                $fileName = str_replace(" ", "-", $model->image_ppal->baseName);
                $fileName = strtolower($fileName) . date('ymdhis') . '.' . strtolower($model->image_ppal->extension);
                $model->image_ppal->saveAs('images/ejemplares/' . $fileName);
                $model->image_ppal = $fileName;
            }

            // SI ME SUBIERON VARIAS IMÁGENES (galería)
            $images = \yii\web\UploadedFile::getInstances($model, 'images');
            $imageNames = [];
            if (!empty($images)) {
                foreach ($images as $image) {
                    $fileName = str_replace(" ", "-", $image->baseName);
                    $fileName = strtolower($fileName) . date('ymdhis') . rand(100, 999) . '.' . strtolower($image->extension);
                    $image->saveAs('images/ejemplares/' . $fileName);
                    $imageNames[] = $fileName;
                }
                $model->images = json_encode($imageNames); // guardo como JSON
            }

            if ($model->save()) {

                // Variables enviadas desde el formulario
                $variablesData = Yii::$app->request->post('EquineVariables', []);

                foreach ($variablesData as $subcategoryId => $variableId) {
                    if (!empty($variableId)) {
                        $ev = new \app\models\EquineVariableValues();
                        $ev->equine_id = $model->id;
                        $ev->subcategory_id = $subcategoryId;
                        $ev->variable_id = $variableId;
                        $ev->active = 1;
                        $ev->save();
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'existingValues' => [],
        ]);
    }

    /**
     * Updates an existing Equines model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $beforeImage = $model->image_ppal;
        $beforeImages = $model->images ? json_decode($model->images, true) : []; // Galería previa

        // Traer valores de variables existentes
        $existingValues = \app\models\EquineVariableValues::find()
            ->where(['equine_id' => $model->id])
            ->indexBy('subcategory_id') // clave: subcategoría
            ->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // SI ME SUBIERON UNA IMAGEN DEL PRODUCTO            
            $model->image_ppal = \yii\web\UploadedFile::getInstance($model, 'image_ppal');
            if (!is_null($model->image_ppal)) {
                $fileName = str_replace(" ", "-", $model->image_ppal->baseName);
                $fileName = strtolower($fileName) . date('ymdhis') . '.' . strtolower($model->image_ppal->extension);
                $model->image_ppal->saveAs('images/ejemplares/' . $fileName);
                $model->image_ppal = $fileName;

                //ELIMINO LA FOTO DEL PRODUCTO ANTIGUA
                if (file_exists('images/ejemplares/' . $beforeImage) && !empty($beforeImage)) {
                    unlink('images/ejemplares/' . $beforeImage);
                }
            }

            // si no se cambio la foto entonces sigo con la antigua
            if (empty($model->image_ppal)) {
                $model->image_ppal = $beforeImage;
            }

            // Variables enviadas desde el formulario
            $variablesData = Yii::$app->request->post('EquineVariables', []);

            // Procesar cada subcategoría recibida
            foreach ($variablesData as $subcategoryId => $variableId) {
                if (empty($variableId)) {
                    // Usuario quitó la selección
                    if (isset($existingValues[$subcategoryId])) {
                        $existingValues[$subcategoryId]->delete();
                    }
                    continue;
                }

                if (isset($existingValues[$subcategoryId])) {
                    // Ya existía → actualizar solo si cambió
                    $ev = $existingValues[$subcategoryId];
                    if ($ev->variable_id != $variableId) {
                        $ev->variable_id = $variableId;

                        $ev->save();
                    }
                } else {

                    // No existía → crear nuevo
                    $ev = new \app\models\EquineVariableValues();
                    $ev->equine_id = $model->id;
                    $ev->subcategory_id = $subcategoryId;
                    $ev->variable_id = $variableId;
                    $ev->value = 1;
                    $ev->active = 1;
                    $ev->save();
                }
            }

            // Limpiar subcategorías que ya no vienen en el POST
            $postedSubcats = array_keys($variablesData);
            foreach ($existingValues as $subcatId => $ev) {
                if (!in_array($subcatId, $postedSubcats)) {
                    $ev->delete();
                }
            }

            // SI ME SUBIERON VARIAS IMÁGENES (galería)
            $images = \yii\web\UploadedFile::getInstances($model, 'images');
            $imageNames = $beforeImages; // conservo las anteriores
            if (!empty($images)) {
                $imageNames = [];
                foreach ($images as $image) {
                    $fileName = str_replace(" ", "-", $image->baseName);
                    $fileName = strtolower($fileName) . date('ymdhis') . rand(100, 999) . '.' . strtolower($image->extension);
                    $image->saveAs('images/ejemplares/' . $fileName);
                    $imageNames[] = $fileName;
                }

                //ELIMINO LA FOTO DEL PRODUCTO ANTIGUA
                foreach ($beforeImages as $beforeImage) {
                    if (file_exists('images/ejemplares/' . $beforeImage) && !empty($beforeImage)) {
                        unlink('images/ejemplares/' . $beforeImage);
                    }
                }
            }
            $model->images = json_encode($imageNames);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'existingValues' => $existingValues,
        ]);
    }

    /**
     * Deletes an existing Equines model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionOurEquines()
    {
        $model = Equines::findAll(["active" => 1]);
        $gaits = \app\models\Gaits::find()->all();
        return $this->render('our-equines', [
            'model' => $model,
            "gaits" => $gaits,
        ]);
    }

    public function actionEquineDetail($id)
    {
        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Finds the Equines model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Equines the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equines::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
