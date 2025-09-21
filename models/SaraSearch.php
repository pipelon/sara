<?php

namespace app\models;

use yii\base\Model;

class SaraSearch extends Model
{

    public $form = [];   // agrupador
    public $variables = [];
    public $chk = [];

    public function rules()
    {
        return [
            [['chk', 'form', 'variables'], 'safe'],
            // Validación manual para nombre_yegua y gait_id
            ['form', 'validateFormFields'],
            // Validar checkboxes con regla personalizada
            ['chk', 'validateChk'],
            // Validar sliders como enteros (siempre que vengan en array)
            ['variables', 'each', 'rule' => ['integer', 'min' => 0]],
            // Validar caso Dorso - Cruz
            ['variables', 'validateCruzDorso'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'form.registro' => 'Registro',
            'form.nombre_yegua' => 'Nombre de la yegua',
            'form.gait_id' => 'Andar',
            'form.madre' => 'Madre',
            'form.padre' => 'Padre',
            'form.abuelo_materno' => 'Abuelo materno',
        ];
    }

    public function validateFormFields($attribute, $params)
    {
        if (empty($this->form['nombre_yegua'])) {
            $this->addError($attribute, 'Debe ingresar el nombre de la yegua');
        }
        if (empty($this->form['gait_id'])) {
            $this->addError($attribute, 'Debe seleccionar un andar');
        }
    }

    public function validateChk($attribute, $params)
    {
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

    public function validateCruzDorso($attribute, $params)
    {
        $chk = (array) $this->chk;

        $needsCruzDorso = in_array('chk-linea-superior-cruz', $chk)
            || in_array('chk-linea-superior-tamano-dorso', $chk);

        if ($needsCruzDorso) {
            $cruz = $this->variables['linea-superior-cruz'] ?? null;
            $dorso = $this->variables['linea-superior-tamano-dorso'] ?? null;

            if (empty($cruz) || empty($dorso)) {
                $this->addError(
                    'variables',
                    'Las variables Cruz y Tamaño del Dorso deben tener un valor, porque están relacionadas.'
                );
            }
        }
    }

}
