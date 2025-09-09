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
        Html::dropDownList('form[andar]', null, $gaits, [
            'class' => 'form-control',
            'prompt' => 'Seleccione una opción'
        ])
        ?>
        <label for="nombre_yegua">Nombre</label>
        <input type="text" class="form-control" id="nombre_yegua" name="form[nombre_yegua]" placeholder="Nombre de la yegua">
    </div>
    <div class="col-4">
        <label for="registro">Registro</label>
        <input type="text" class="form-control" id="registro" name="form[registro]" placeholder="Registro">
    </div>
    <div class="col-4">
        <label for="andar">Andar</label>
        <input type="text" class="form-control" id="andar" name="form[andar]" placeholder="Andar">
    </div>
</div>