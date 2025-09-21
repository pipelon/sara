<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Sara';
$this->params['breadcrumbs'][] = $this->title;

//VALIDO SI ES UN POST O UNA PRIMERA CARGA
$isFirstLoad = empty($model->variables) && !$model->hasErrors();
$this->registerJs("window.isFirstLoad = " . ($isFirstLoad ? "true" : "false") . ";", \yii\web\View::POS_HEAD);

// ARCHIVO CON TODOS LOS JS NECESARIOS PARA LA BUSAUEDA
$this->registerJsFile(Yii::getAlias('@web') . '/js/sara.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>
<style type="text/css">
    .labelVariableRange {
        font-size: 12px;
    }

    .form-group.variable {
        margin-bottom: 3rem;
    }

    .h5subtitu::after {
        content: "";
        display: block;
        position: relative;
        width: 5%;
        height: 3px;
        background: #be132d;
    }

    .h5subtitu.margin-space {
        margin: 30px 0;
    }

    .sara-tab a.nav-link {
        color: #495057;
    }

    .sara-tab a.nav-link.active {
        color: #be132d;
    }
</style>
<div class="container-fluid">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']) ?>

    <!-- DATOS DE LA YEGUA -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Datos de la yegua</h3>
        </div>
        <div class="card-body">
            <?=
                $this->render('_formYegua', ['model' => $model, 'form' => $form])
                ?>
        </div>
    </div>

    <!-- VARAIBLES -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Variables</h3>
        </div>
        <div class="card-body">
            <?=
                $this->render('_variables', ['model' => $model, 'form' => $form])
                ?>
        </div>
    </div>

    <!-- MEJORAMIENTO DEL REPRODUCTOR -->
    <!--<div class="card">
        <div class="card-header">
            <h3 class="card-title">Mejoramiento del reproductor</h3>
        </div>
        <div class="card-body">
            <?php //=$this->render('_mejoramiento', ['model' => $model, 'form' => $form])
            ?>
        </div>
    </div>-->

    <!-- BOTON BUSCADOR -->
    <div class="card">
        <div class="card-footer">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-danger', 'name' => 'action', 'value' => 'search']) ?>
            <?= Html::submitButton('Buscar y Guardar', ['class' => 'btn btn-success', 'name' => 'action', 'value' => 'search_and_save']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <?php if (isset($results) && count($results) > 0): ?>
        <div class="card">
            <div class="card-body">
                <?php foreach ($results as $result): ?>
                    <div class="col-sm-3">
                        <?= $result->name; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php elseif (isset($results) && count($results) == 0): ?>
        <div class="card">
            <div class="card-body">
                No se encontraron resultados
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- MODAL UNICO REUTILIZABLE PARA TODAS LAS VARIABLES, CATEGORIAS Y SUBCATEGORIAS -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="infoModalDescription"></div>
        </div>
    </div>
</div>