<?php

namespace app\models;

use yii\base\Model;

class SaraSearch extends Model {

    public $form = [];   // agrupador
    public $variables = [];
    public $chk = [];

    public function rules() {
        return [
            [['chk', 'form', 'variables'], 'safe'],
            // Validar checkboxes con regla personalizada
            ['chk', 'validateChk'],
            // Validar sliders como enteros (siempre que vengan en array)
            ['variables', 'each', 'rule' => ['integer', 'min' => 0]],
        ];
    }

    public function attributeLabels() {
        return [
            'form.registro' => 'Registro',
            'form.nombre_yegua' => 'Nombre de la yegua',
            'form.gait_id' => 'Andar',
            'form.madre' => 'Madre',
            'form.padre' => 'Padre',
            'form.abuelo_materno' => 'Abuelo materno',
        ];
    }

    public function validateChk($attribute, $params) {
        $value = (array) $this->$attribute;
        // Filtrar vacíos (por el hidden input)
        $value = array_filter($value);

        $count = count($value);

        if ($count > 3) {
            $this->addError($attribute, 'Seleccione máximo 6 variables de mejoramiento.');
        }
        if ($count < 1) {
            $this->addError($attribute, 'Debe seleccionar al menos una variable de mejoramiento.');
        }
    }

}
