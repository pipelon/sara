<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'autocomplete' => "off", 'id' => 'p1']) ?>

    <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true, 'autocomplete' => "off", 'id' => 'p2']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(Yii::$app->utils->getFilterConditional()); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
