<?php

namespace app\models;

use yii\base\Model;

class SaraSearch extends Model {

    public $yegua;       // datos de la yegua
    public $variables = [];   // sliders (array)
    public $chk = [];    // checkboxes de mejoramiento

    public function rules() {
        return [
            ['chk', 'safe'],
            // Validar checkboxes con regla personalizada
            ['chk', 'validateChk'],
            // Validar sliders como enteros (siempre que vengan en array)
            ['variables', 'each', 'rule' => ['integer', 'min' => 0]],
        ];
    }

    public function validateChk($attribute, $params) {
        $value = (array) $this->$attribute;
        // Filtrar vacíos (por el hidden input)
        $value = array_filter($value);

        $count = count($value);

        if ($count > 6) {
            $this->addError($attribute, 'Seleccione máximo 6 variables de mejoramiento.');
        }
        if ($count < 1) {
            $this->addError($attribute, 'Debe seleccionar al menos una variable de mejoramiento.');
        }
    }

}
