<?php

namespace app\components;

class RuleEngine
{
    private array $rules = [
        'tamano-y-forma-corporal-figura' => [
            1 => [['variable_id' => [3, 2]]],
            2 => [['variable_id' => [1, 3]]],
            3 => [['variable_id' => [1, 2]]],
        ],
        'tamano-y-forma-corporal-orientacion' => [
            1 => [['variable_id' => [2, 3]]],
            2 => [['variable_id' => [3, 2]]],
            3 => [['variable_id' => [3]]],
        ],
        'tamano-y-forma-corporal-horizontal' => [
            1 => [['variable_id' => [3, 2]]],
            2 => [['variable_id' => [3]]],
            3 => [['variable_id' => [2]]],
        ],
        'tamano-y-forma-corporal-estatura' => [
            'paso-fino' => [
                1 => [['variable_id' => [3, 2]]],
                2 => [['variable_id' => [3]]],
                3 => [['variable_id' => [3]]],
            ],
            'trocha' => [
                1 => [['variable_id' => [3, 2]]],
                2 => [['variable_id' => [3]]],
                3 => [['variable_id' => [2, 1]]],
            ],
            'trocha-y-galope' => [
                1 => [['variable_id' => [3, 2]]],
                2 => [['variable_id' => [3]]],
                3 => [['variable_id' => [2, 3]]],
            ],
            'trote-y-galope' => [
                1 => [['variable_id' => [3, 2]]],
                2 => [['variable_id' => [3]]],
                3 => [['variable_id' => [2, 3]]],
            ]
        ],

        'dorso_cruz' => [
            'combination' => true,
            'rules' => [
                '1-1' => [
                    ['lineaSuperior_cruz' => 1, 'dorso_tamano' => 1],
                    ['lineaSuperior_cruz' => 2, 'dorso_tamano' => 2],
                ],
                '1-2' => [
                    ['lineaSuperior_cruz' => 1, 'dorso_tamano' => 2],
                    ['lineaSuperior_cruz' => 2, 'dorso_tamano' => 2],
                ],
                // ...
            ]
        ]
    ];

    public function getAllowedValues(string $key, string $gait, array $variables): array
    {
        if (!isset($this->rules[$key]) && !isset($this->rules[$key][$gait])) {
            return [];
        }

        if (isset($this->rules[$key][$gait])) {           
            $rule = $this->rules[$key][$gait];
        } else {
            $rule = $this->rules[$key];
        }
        

        // Caso compuesto
        if (!empty($rule['combination'])) {
            // ej: "1-2"
            $comboKey = implode('-', $variables);
            return $rule['rules'][$comboKey] ?? [];
        }

        echo $key . "<br>";
        // Caso simple
        $valor = $variables[$key];
        echo $valor . "<br>";
        return $rule[$valor] ?? [];
    }

}