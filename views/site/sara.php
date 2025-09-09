<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Sara';
$this->params['breadcrumbs'][] = $this->title;

// ARCHIVO CON TODOS LOS JS NECESARIOS PARA LA BUSAUEDA
$this->registerJsFile(Yii::getAlias('@web') . '/js/sara.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>
<style type="text/css">
    .labelVariableRange {
        font-size: 12px;
    }
    .form-group.variable{
        margin-bottom: 3rem;
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Mejoramiento del reproductor</h3>
        </div>
        <div class="card-body">
            <?=
            $this->render('_mejoramiento', ['model' => $model, 'form' => $form])
            ?>                 
        </div>        
    </div>

    <!-- BOTON BUSCADOR -->
    <div class="card">
        <div class="card-footer">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
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