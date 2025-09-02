<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subcategories */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="subcategories-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $categories = yii\helpers\ArrayHelper::map(
                    \app\models\Categories::find()
                            ->orderBy('name ASC')
                            ->all()
                    , 'id', 'name');
    ?>
    <?= $form->field($model, 'category_id')->dropDownList($categories); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->dropDownList(Yii::$app->utils->getFilterConditional()); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
