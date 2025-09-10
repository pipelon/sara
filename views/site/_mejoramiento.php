<?php

use yii\bootstrap4\Html;
?>
<div class="row">
    <div class="col-sm-12">
        <p>*Seleccione máximo 6 características en el orden de prioridad de mejoramiento.</p>
        <?= Html::hiddenInput(Html::getInputName($model, 'chk') . '[]', '') ?>
    </div>

    <div class="col-sm-3">
        <?=
        $form->field($model, 'chk')->checkboxList([
            'chk_geometria_figura' => 'Figura',
            'chk_geometria_orientacion' => 'Orientación',
                ], [
            'unselect' => null,
            'item' => function($index, $label, $name, $checked, $value) {
                return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-control-input-danger custom-control-input-outline"
                           id="' . $value . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . '>
                    <label class="custom-control-label" for="' . $value . '">' . $label . '</label>
                </div>';
            },
        ])->label(false)
        ?>
    </div>
    <div class="col-sm-3">
        <?=
        $form->field($model, 'chk')->checkboxList([
            'chk_espalda_tamano' => 'Tamaño',
            'chk_espalda_fuerza' => 'Fuerza',
                ], [
            'unselect' => null,
            'item' => function($index, $label, $name, $checked, $value) {
                return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-control-input-danger custom-control-input-outline"
                           id="' . $value . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . '>
                    <label class="custom-control-label" for="' . $value . '">' . $label . '</label>
                </div>';
            },
        ])->label(false)
        ?>
    </div>


</div>

