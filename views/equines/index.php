<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ejemplares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Crear ejemplar', ['create'], ['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'id',
                            'name',
                            [
                                'attribute' => 'image_ppal',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return '@web/images/ejemplares/' . $data->image_ppal;
                                },
                                'format' => ['image', ['width' => '50', 'height' => '50', 'class' => 'img-circle']],
                                'filter' => false
                            ],
                            [
                                'attribute' => 'gait_id',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return $data->gait->name;
                                },
                                'filter' => yii\helpers\ArrayHelper::map(
                                        \app\models\Gaits::find()
                                                ->orderBy('name ASC')
                                                ->all()
                                        , 'id', 'name')
                            ],
                            [
                                'attribute' => 'gender',
                                'format' => 'raw',
                                'value' => 'gender',                                
                                'filter' => Yii::$app->utils->getGender()
                            ],
                            'age',
                            //'location:ntext',
                            //'color',
                            //'stud_farm',
                            //'vet',
                            //'colletion_days',
                            //'about_me:ntext',
                            //'history:ntext',
                            //'images:ntext',
                            //'owner',
                            //'active',
                            //'created',
                            //'created_by',
                            //'modified',
                            //'modified_by',
                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]);
                    ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
