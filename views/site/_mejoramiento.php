<?php

use yii\bootstrap4\Html;
?>
<style>
    .custom-control-input:disabled~.custom-control-label,
    .custom-control-input[disabled]~.custom-control-label {
        color: #dddfe1;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <p>*Seleccione máximo 6 características en el orden de prioridad de mejoramiento.</p>
        <?= Html::hiddenInput(Html::getInputName($model, 'chk') . '[]', '') ?>
    </div>

    <div class="col-sm-4">
        <?=
            $form->field($model, 'chk')->checkboxList([
                'chk-tamano-y-forma-corporal-figura' => 'Figura',
                'chk-espalda-tamano' => 'Tamaño espalda',
                'chk-grupa-longitud' => 'Longitud grupa',
                'chk-aplomos-anteriores-frontalmente' => 'Aplomos anteriores (frente)',
                'chk-aplomos-anteriores-lateralmente' => 'Aplomos anteriores (Lateral)',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
                            return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-control-input-danger custom-control-input-outline"
                           id="' . $value . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . '>
                    <label class="custom-control-label" for="' . $value . '">' . $label . '</label>
                </div>';
                        },
            ])->label(false)
            ?>
    </div>
    <div class="col-sm-4">
        <?=
            $form->field($model, 'chk')->checkboxList([
                'chk-tamano-y-forma-corporal-orientacion' => 'Orientación',
                'chk-espalda-orientacion' => 'Orientación espalda',
                'chk-grupa-anchura' => 'Anchura grupa',
                'chk-aplomos-posteriores-atras' => 'Aplomos posteriores (Posterior)',
                'chk-aplomos-posteriores-lateralmente' => 'Aplomos posteriores (Lateral)',

            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
                return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-control-input-danger custom-control-input-outline"
                           id="' . $value . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . '>
                    <label class="custom-control-label" for="' . $value . '">' . $label . '</label>
                </div>';
            },
            ])->label(false)
            ?>
    </div>
    <div class="col-sm-4">
        <?=
            $form->field($model, 'chk')->checkboxList([
                'chk-tamano-y-forma-corporal-horizontal' => 'Balance horizontal',
                'chk-tamano-y-forma-corporal-estatura' => 'Alzada',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
                return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-control-input-danger custom-control-input-outline"
                           id="' . $value . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . '>
                    <label class="custom-control-label" for="' . $value . '">' . $label . '</label>
                </div>';
            },
            ])->label(false)
            ?>
    </div>

    <div class="col-sm-12">
        <h5 class="h5subtitu margin-space">Línea superior</h5>
    </div>

    <div class="col-sm-3">
        <?=
            $form->field($model, 'chk')->checkboxList([
                'chk-linea-superior-cabeza' => 'Cabeza',
                'chk-linea-superior-tamano-dorso' => 'Tamaño Dorso',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-linea-superior-longitud-cuello' => 'Longitud cuello',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-linea-superior-cruz' => 'Cruz',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-linea-superior-pecho' => 'Pecho',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
                return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-control-input-danger custom-control-input-outline"
                           id="' . $value . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . '>
                    <label class="custom-control-label" for="' . $value . '">' . $label . '</label>
                </div>';
            },
            ])->label(false)
            ?>
    </div>

    <div class="col-sm-12">
        <h5 class="h5subtitu margin-space">Morfometría</h5>
    </div>

    <div class="col-sm-3">
        <?=
            $form->field($model, 'chk')->checkboxList([
                'chk-morfometria-cana-anterior' => 'Caña anterior',
                'chk-morfometria-cuartilla-posterior' => 'Cuartilla posterior',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-morfometria-cuartilla-anterior' => 'Cuartilla anterior',
                'chk-morfometria-antebrazo' => 'Antebrazo'
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-morfometria-femur' => 'Fémur',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-morfometria-cana-posterior' => 'Caña posterior',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
                return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-control-input-danger custom-control-input-outline"
                           id="' . $value . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . '>
                    <label class="custom-control-label" for="' . $value . '">' . $label . '</label>
                </div>';
            },
            ])->label(false)
            ?>
    </div>

    <div class="col-sm-12">
        <h5 class="h5subtitu margin-space">Movimiento</h5>
    </div>

    <div class="col-sm-3">
        <?=
            $form->field($model, 'chk')->checkboxList([
                'chk-movimiento-velocidad' => 'Velocidad',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-movimiento-elevacion-anteriores' => 'Elevación anterior',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-movimiento-elevacion-posteriores' => 'Elevación posterior',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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
                'chk-movimiento-potencia-en-la-pisada' => 'Potencia en la pisada',
            ], [
                'unselect' => null,
                'item' => function ($index, $label, $name, $checked, $value) {
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