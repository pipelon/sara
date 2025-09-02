<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equines */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="equines-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']) ?>

    <?php
    $gaits = yii\helpers\ArrayHelper::map(
                    \app\models\Gaits::find()
                            ->orderBy('name ASC')
                            ->all()
                    , 'id', 'name');
    ?>
    <?= $form->field($model, 'gait_id')->dropDownList($gaits); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(Yii::$app->utils->getGender()); ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stud_farm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colletion_days')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_me')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'history')->textarea(['rows' => 6]) ?>

    <?=
    $model->image_ppal ?
            Html::img("@web/images/ejemplares/{$model->image_ppal}",
                    [
                        'style' => 'width: 100px; heigth: 100px; margin: 30px 0;',
                        'alt' => 'Imagen del ejemplar',
                        'class' => 'img-circle'
                    ]
            ) : "Sin Imagen"
    ?>
    <?=
    $form->field($model, 'image_ppal')->widget(kartik\file\FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'allowedFileExtensions' => ['png', 'jpg', 'jpeg'], // soporta jpeg
            'removeClass' => 'btn btn-danger',
            'browseIcon' => '<i class="flaticon-folder"></i> ',
            'showPreview' => false,
            'showUpload' => false, // desactiva el botón de upload propio
            'removeIcon' => '<i class="flaticon-circle"></i> ',
            'maxFileSize' => 153600, // 150 MB
            'msgSizeTooLarge' => 'El archivo "{name}" (<b>{size} KB</b>) excede el tamaño máximo permitido de <b>{maxSize} KB</b>.',
            'msgInvalidFileExtension' => 'Extensión inválida para "{name}". Solo se permiten: {extensions}.',
            'msgInvalidFileType' => 'Tipo de archivo inválido para "{name}". Solo se aceptan imágenes.',
            'msgValidationErrorClass' => 'text-danger', // clase CSS para errores
            'msgErrorClass' => 'alert alert-danger', // estilo bootstrap para mensajes
        ]
    ]);
    ?>

    <?= $form->field($model, 'images')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(Yii::$app->utils->getFilterConditional()); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
