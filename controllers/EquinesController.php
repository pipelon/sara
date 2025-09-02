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
class EquinesController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
    public function actionIndex() {
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
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Equines model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
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
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Equines model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        
        $beforeImage = $model->image_ppal;

        if ($model->load(Yii::$app->request->post())) {

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

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Equines model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Equines model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Equines the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Equines::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
