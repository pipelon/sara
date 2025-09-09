<?php

use yii\bootstrap4\Html;

?>
<p>*Seleccione máximo 6 características en el orden de prioridad de mejoramiento.</p>
<?= Html::hiddenInput(Html::getInputName($model, 'chk') . '[]', '') ?>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <?=
                $form->field($model, 'chk[]', [
                    'options' => ['class' => 'custom-control custom-checkbox'],
                    'template' => "{input}\n{label}\n{error}",
                ])->checkbox([
                    'value' => 'chk_geometria_figura',
                    'uncheck' => null,
                    'id' => 'chk_geometria_figura',
                    'class' => 'custom-control-input custom-control-input-danger custom-control-input-outline',
                ])->label('Figura', ['class' => 'custom-control-label'])
                ?>
            </div>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" 
                       name="chk[chk_espalda_tamano]"
                       value="chk_espalda_tamano"
                       type="checkbox" 
                       id="chk_espalda_tamano">
                <label for="chk_espalda_tamano" class="custom-control-label">
                    chk_espalda_tamano
                </label>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        
    </div>
    <div class="col-sm-3">
        
    </div>
    <div class="col-sm-3">
        
    </div>



</div>

