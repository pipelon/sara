<?php

use app\models\SaraSearchHistory;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

$gaits = yii\helpers\ArrayHelper::map(
        \app\models\Gaits::find()
                ->orderBy('name ASC')
                ->all()
        ,
        'id',
        'name'
);
$histories = SaraSearchHistory::find()
        ->where(["created_by" => Yii::$app->user->identity->username])
        ->orderBy(['created' => SORT_DESC])
        ->limit(10)
        ->all();
$options = ArrayHelper::map($histories, 'id', function ($row) {
        return $row->nombre_yegua . ' (' . $row->gait->name . ', ' . $row->created . ')';
});

?>
<div class="row">
        <?php if ($histories): ?>
                <div class="col-sm-12">
                        <div class="form-group">
                                <?= Html::label('Cargar búsqueda previa', 'prevSearch') ?>
                                <?= Html::dropDownList('prevSearch', null, $options, [
                                        'prompt' => 'Seleccione búsqueda previa',
                                        'class' => 'form-control',
                                        'id' => 'prevSearch'
                                ]) ?>
                        </div>
                </div>
        <?php endif; ?>
        <div class="col-sm-6">
                <?=
                        $form->field($model, 'form[nombre_yegua]')
                                ->textInput(['placeholder' => 'Nombre de la yegua'])
                                ->label($model->getAttributeLabel('form.nombre_yegua'))
                        ?>
        </div>
        <div class="col-sm-6">
                <?=
                        $form->field($model, 'form[gait_id]')->dropDownList(
                                $gaits,
                                ['prompt' => 'Seleccione una opción']
                        )->label($model->getAttributeLabel('form.gait_id'))
                        ?>
        </div>
</div>