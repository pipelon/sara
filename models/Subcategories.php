<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcategories".
 *
 * @property int $id ID
 * @property int $category_id Categoría
 * @property string $name Nombre
 * @property string|null $description Descripción
 * @property int $active Activo
 * @property string $created Creado
 * @property string $created_by Creado por
 * @property string $modified Modificado
 * @property string $modified_by Modificado por
 *
 * @property Categories $category
 * @property EquineVariableValues[] $equineVariableValues
 * @property Equines[] $equines
 * @property Variables[] $variables
 */
class Subcategories extends BeforeModel {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'subcategories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['description'], 'default', 'value' => null],
            [['category_id', 'name', 'active'], 'required'],
            [['category_id', 'active'], 'integer'],
            [['description'], 'string'],
            [['created', 'modified'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['created_by', 'modified_by'], 'string', 'max' => 50],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'Categoría',
            'name' => 'Nombre',
            'description' => 'Descripción',
            'active' => 'Activo',
            'created' => 'Creado',
            'created_by' => 'Creado por',
            'modified' => 'Modificado',
            'modified_by' => 'Modificado por',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[EquineVariableValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquineVariableValues() {
        return $this->hasMany(EquineVariableValues::class, ['subcategory_id' => 'id']);
    }

    /**
     * Gets query for [[Equines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquines() {
        return $this->hasMany(Equines::class, ['id' => 'equine_id'])->viaTable('equine_variable_values', ['subcategory_id' => 'id']);
    }

    /**
     * Gets query for [[Variables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVariables() {
        return $this->hasMany(Variables::class, ['subcategory_id' => 'id']);
    }

}
