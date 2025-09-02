<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Subcategories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subcategorías', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
                        <?=
                        Html::a('Borrar', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Estás seguro que deseas eliminar este ítem?',
                                'method' => 'post',
                            ],
                        ])
                        ?>
                    </p>
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            [
                                'attribute' => 'category_id',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return $data->category->name;
                                },
                            ],
                            'name',
                            [
                                'attribute' => 'active',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return Yii::$app->utils->getConditional($data->active);
                                },
                            ],
                            'created:date',
                            'created_by',
                            'modified:date',
                            'modified_by',
                        ],
                    ])
                    ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>