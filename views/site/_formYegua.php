<?php

use yii\bootstrap4\Html;

$gaits = yii\helpers\ArrayHelper::map(
                \app\models\Gaits::find()
                        ->orderBy('name ASC')
                        ->all()
                , 'id', 'name');
?>
<div class="row">
    <div class="col-4">        

        <?=
                $form->field($model, 'form[nombre_yegua]')
                ->textInput(['placeholder' => 'Nombre de la yegua'])
                ->label($model->getAttributeLabel('form.nombre_yegua'))
        ?>
        <?=
                $form->field($model, 'form[padre]')
                ->textInput(['placeholder' => 'Nombre del padre'])
                ->label($model->getAttributeLabel('form.padre'))
        ?>
    </div>
    <div class="col-4">
        <?=
                $form->field($model, 'form[registro]')
                ->textInput(['placeholder' => 'Registro'])
                ->label($model->getAttributeLabel('form.registro'))
        ?>
        <?=
                $form->field($model, 'form[madre]')
                ->textInput(['placeholder' => 'Nombre de la madre'])
                ->label($model->getAttributeLabel('form.madre'))
        ?>

    </div>
    <div class="col-4">
        <?=
        $form->field($model, 'form[gait_id]')->dropDownList(
                $gaits,
                ['prompt' => 'Seleccione una opción']
        )
        ?>
        <?=
                $form->field($model, 'form[abuelo_materno]')
                ->textInput(['placeholder' => 'Nombre del abuelo materno'])
                ->label($model->getAttributeLabel('form.abuelo_materno'))
        ?>
    </div>
</div>