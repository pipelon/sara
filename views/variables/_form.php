<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Variables */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="variables-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $subcategories = yii\helpers\ArrayHelper::map(
                    \app\models\Subcategories::find()
                            ->orderBy('name ASC')
                            ->all()
                    , 'id', 'name');
    ?>
    <?= $form->field($model, 'subcategory_id')->dropDownList($subcategories); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(Yii::$app->utils->getFilterConditional()); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
