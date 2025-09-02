<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gaits".
 *
 * @property int $id Id
 * @property string $name Modalidad
 * @property string $created Creado
 * @property string $created_by Creado por
 * @property string $modified Modificado
 * @property string $modified_by Modificado por
 */
class Gaits extends BeforeModel {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'gaits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['created', 'modified'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['created_by', 'modified_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'Id',
            'name' => 'Modalidad',
            'created' => 'Creado',
            'created_by' => 'Creado por',
            'modified' => 'Modificado',
            'modified_by' => 'Modificado por',
        ];
    }

}
