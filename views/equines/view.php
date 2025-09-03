<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equines */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ejemplares', 'url' => ['index']];
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
                                'attribute' => 'gait_id',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return $data->gait->name;
                                },
                            ],
                            'name',
                            'gender',
                            'age',
                            'color',
                            'stud_farm',
                            'vet',
                            'colletion_days',
                            'about_me:ntext',
                            'history:ntext',
                            'owner',
                            [
                                'attribute' => 'active',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return Yii::$app->utils->getConditional($data->active);
                                },
                            ],
                            [
                                'label' => 'Características',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $html = "<ul class='list-unstyled'>";
                                    foreach ($model->variableValues as $vv) {
                                        $categoria = $vv->subcategory->category->name ?? '-';
                                        $subcat = $vv->subcategory->name ?? '-';
                                        $valor = $vv->variable->name ?? '-';
                                        $num = $vv->variable->value ?? null;

                                        $html .= "<li><strong>{$categoria}</strong> - {$subcat}: {$valor}";
                                        if ($num !== null) {
                                            $html .= " ({$num})";
                                        }
                                        $html .= "</li>";
                                    }
                                    $html .= "</ul>";
                                    return $html;
                                }
                            ],
                            'created',
                            'created_by',
                            'modified',
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