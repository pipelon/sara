<?php

namespace app\components;

use yii\base\Component;

/**
 * Description of Utils
 *
 * @author fecheverri
 */
class Utils extends Component {

    /**
     * Funcion para pintar el badge de registro activo
     * 
     * @author Felipe Echeverri
     * @param int $condition
     * @return string
     */
    public function getConditional($condition) {
        return $condition == 1 || strtolower($condition) == 'si' ?
                "<span class='badge bg-green'>SI</span>" :
                "<span class='badge bg-red'>NO</span>";
    }

    public function getAccountStatusBadge($condition) {
        return $condition == 1 || strtolower($condition) == 'pagado' ?
                "<span class='badge bg-green'>Pagado</span>" :
                "<span class='badge bg-red'>Pendiente</span>";
    }

    /**
     * Funcion que retorna el filtro de activo
     * 
     * @author Felipe Echeverri
     * @return array
     */
    public function getFilterConditional() {
        return [
            '1' => 'SI',
            '0' => 'NO',
        ];
    }

    public function getGender() {
        return [
            'Macho' => 'Macho',
            'Hembra' => 'Hembra',
        ];
    }

    public function getAccountStatus() {
        return [
            '1' => 'Pagado',
            '0' => 'Pendiente',
        ];
    }

    public function slugify($text) {
        // Quitar acentos y normalizar
        $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        // Pasar a minúsculas
        $text = strtolower($text);
        // Reemplazar espacios por guiones
        $text = preg_replace('/\s+/', '-', $text);
        // Eliminar cualquier caracter que no sea letras, números o guiones
        $text = preg_replace('/[^a-z0-9\-]/', '', $text);
        // Limpiar guiones duplicados
        $text = preg_replace('/-+/', '-', $text);
        // Trim final
        return trim($text, '-');
    }

}
