<?php
/* @var $this yii\web\View */
/* @var $model app\models\Subcategories */

$this->title = 'Actualizar subcategoria: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subcategorías', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=
                    $this->render('_form', [
                        'model' => $model
                    ])
                    ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>