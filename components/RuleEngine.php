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
                    ['linea-superior-cruz' => 1, 'linea-superior-tamano-dorso' => 1],
                    ['linea-superior-cruz' => 2, 'linea-superior-tamano-dorso' => 2],
                ],
                '1-2' => [
                    ['linea-superior-cruz' => 1, 'linea-superior-tamano-dorso' => 2],
                    ['linea-superior-cruz' => 2, 'linea-superior-tamano-dorso' => 2],
                ],
                // ...
            ]
        ]
    ];

    public function getAllowedValues(string $key, string $gait, array $variables): array
    {
        if (isset($this->rules[$key][$gait])) {
            $rule = $this->rules[$key][$gait];
        } elseif (isset($this->rules[$key])) {
            $rule = $this->rules[$key];
        } else {
            return [];
        }

        // Caso compuesto
        if (!empty($rule['combination']) && isset($rule['rules'])) {

            // $variables[$key] debe ser un array asociativo con los sub-slugs en el orden esperado
            if (!isset($variables[$key]) || !is_array($variables[$key])) {
                return [];
            }
            // construir comboKey respetando el orden de los valores en el array compuesto
            // (array_values respeta el orden de inserción, por eso extractVariables debe insertarlos en el orden correcto)
            $comboKey = implode('-', array_values($variables[$key]));
            return $rule['rules'][$comboKey] ?? [];
        }

        // Caso simple
        $valor = $variables[$key] ?? null;
        if ($valor === null) {
            return [];
        }
        return $rule[$valor] ?? [];
    }

}