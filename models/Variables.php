<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "variables".
 *
 * @property int $id ID
 * @property int $subcategory_id Subcategoría
 * @property string $name Nombre
 * @property string|null $description Descripción
 * @property string $value Valor
 * @property int $active Activo
 * @property string $created Creado
 * @property string $created_by Creado por
 * @property string $modified Modificado
 * @property string $modified_by Modificado por
 *
 * @property EquineVariableValues[] $equineVariableValues
 * @property Subcategories $subcategory
 */
class Variables extends BeforeModel {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'variables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['description'], 'default', 'value' => null],
            [['subcategory_id', 'name', 'value', 'active'], 'required'],
            [['subcategory_id', 'active'], 'integer'],
            [['description'], 'string'],
            [['created', 'modified'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['value', 'created_by', 'modified_by'], 'string', 'max' => 50],
            [['subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategories::class, 'targetAttribute' => ['subcategory_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'subcategory_id' => 'Subcategoría',
            'name' => 'Nombre',
            'description' => 'Descripción',
            'value' => 'Valor',
            'active' => 'Activo',
            'created' => 'Creado',
            'created_by' => 'Creado por',
            'modified' => 'Modificado',
            'modified_by' => 'Modificado por',
        ];
    }

    /**
     * Gets query for [[EquineVariableValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquineVariableValues() {
        return $this->hasMany(EquineVariableValues::class, ['variable_id' => 'id']);
    }

    /**
     * Gets query for [[Subcategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategory() {
        return $this->hasOne(Subcategories::class, ['id' => 'subcategory_id']);
    }

}
