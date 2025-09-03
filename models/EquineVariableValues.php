<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equine_variable_values".
 *
 * @property int $id II
 * @property int $equine_id Ejemplar
 * @property int $subcategory_id Subcategoría
 * @property int $variable_id Variable
 * @property int $active Activo
 * @property string $created Creado
 * @property string $created_by Creado por
 * @property string $modified Modificado
 * @property string $modified_by Modificado por
 *
 * @property Equines $equine
 * @property Subcategories $subcategory
 * @property Variables $variable
 */
class EquineVariableValues extends BeforeModel {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'equine_variable_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['equine_id', 'subcategory_id', 'variable_id', 'active'], 'required'],
            [['equine_id', 'subcategory_id', 'variable_id', 'active'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['created_by', 'modified_by'], 'string', 'max' => 50],
            [['equine_id', 'subcategory_id'], 'unique', 'targetAttribute' => ['equine_id', 'subcategory_id']],
            [['equine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equines::class, 'targetAttribute' => ['equine_id' => 'id']],
            [['subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategories::class, 'targetAttribute' => ['subcategory_id' => 'id']],
            [['variable_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::class, 'targetAttribute' => ['variable_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'II',
            'equine_id' => 'Ejemplar',
            'subcategory_id' => 'Subcategoría',
            'variable_id' => 'Variable',
            'active' => 'Activo',
            'created' => 'Creado',
            'created_by' => 'Creado por',
            'modified' => 'Modificado',
            'modified_by' => 'Modificado por',
        ];
    }

    /**
     * Gets query for [[Equine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquine() {
        return $this->hasOne(Equines::class, ['id' => 'equine_id']);
    }

    /**
     * Gets query for [[Subcategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategory() {
        return $this->hasOne(Subcategories::class, ['id' => 'subcategory_id']);
    }

    /**
     * Gets query for [[Variable]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVariable() {
        return $this->hasOne(Variables::class, ['id' => 'variable_id']);
    }

}
