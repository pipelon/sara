<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubcategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subcategorías';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Crear Subcategoría', ['create'], ['class' => 'btn btn-danger']) ?>
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
                                'attribute' => 'category_id',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return $data->category->name;
                                },
                                'filter' => yii\helpers\ArrayHelper::map(
                                        \app\models\Categories::find()
                                                ->orderBy('name ASC')
                                                ->all()
                                        , 'id', 'name')
                            ],
                            [
                                'attribute' => 'active',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return Yii::$app->utils->getConditional($data->active);
                                },
                                'filter' => Yii::$app->utils->getFilterConditional()
                            ],
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
