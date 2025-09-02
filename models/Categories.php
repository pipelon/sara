<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id ID
 * @property string $name Nombre de la categoría
 * @property string|null $description Descripción de la categoría
 * @property int $active Activo
 * @property string $created Creado
 * @property string $created_by Creado por
 * @property string $modified Modificado
 * @property string $modified_by Modificado por
 *
 * @property Subcategories[] $subcategories
 */
class Categories extends BeforeModel
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'default', 'value' => null],
            [['name', 'active'], 'required'],
            [['description'], 'string'],
            [['active'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['created_by', 'modified_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre de la categoría',
            'description' => 'Descripción de la categoría',
            'active' => 'Activo',
            'created' => 'Creado',
            'created_by' => 'Creado por',
            'modified' => 'Modificado',
            'modified_by' => 'Modificado por',
        ];
    }

    /**
     * Gets query for [[Subcategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategories()
    {
        return $this->hasMany(Subcategories::class, ['category_id' => 'id']);
    }

}
