<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equines".
 *
 * @property int $id ID
 * @property int $gait_id Marcha
 * @property string $name Nombre
 * @property string $gender Género
 * @property int $age Edad
 * @property string|null $location Ubicación
 * @property string $color Color
 * @property string|null $stud_farm Criadero
 * @property string|null $vet Veterinario
 * @property string|null $colletion_days Días de colecta
 * @property string $about_me Acerca de mí
 * @property string $history Mi Historia
 * @property string|null $images Imágenes
 * @property string|null $owner Propietario
 * @property int $active Activo
 * @property string $created Creado
 * @property string $created_by Creado por
 * @property string $modified Modificado
 * @property string $modified_by Modificado por
 *
 * @property Menu $gait
 */
class Equines extends BeforeModel
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location', 'stud_farm', 'vet', 'colletion_days', 'image_ppal', 'images', 'owner'], 'default', 'value' => null],
            [['gait_id', 'name', 'gender', 'age', 'color', 'about_me', 'history', 'active'], 'required'],
            [['gait_id', 'age', 'active'], 'integer'],
            [['location', 'about_me', 'history'], 'string'],
            [['created', 'modified'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 20],
            [['color', 'created_by', 'modified_by'], 'string', 'max' => 50],
            [['stud_farm', 'vet', 'colletion_days', 'owner', 'image_ppal'], 'string', 'max' => 200],
            [
                ['image_ppal'],
                'file',
                'extensions' => 'png, jpg, jpeg',
                'mimeTypes' => 'image/jpeg, image/png',
                'maxSize' => 153600 //150KB
            ],
            [
                ['images'],
                'file',
                'extensions' => 'png, jpg, jpeg',
                'mimeTypes' => 'image/jpeg, image/png',
                'maxSize' => 153600, // 150 KB
                'maxFiles' => 10 // máximo 10 imágenes
            ],
            [['gait_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gaits::class, 'targetAttribute' => ['gait_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gait_id' => 'Marcha',
            'name' => 'Nombre',
            'gender' => 'Género',
            'age' => 'Edad',
            'location' => 'Ubicación',
            'color' => 'Color',
            'stud_farm' => 'Criadero',
            'vet' => 'Veterinario',
            'colletion_days' => 'Días de colecta',
            'about_me' => 'Acerca de mí',
            'history' => 'Mi Historia',
            'images' => 'Galería de imágenes',
            'image_ppal' => 'Imagen principal',
            'owner' => 'Propietario',
            'active' => 'Activo',
            'created' => 'Creado',
            'created_by' => 'Creado por',
            'modified' => 'Modificado',
            'modified_by' => 'Modificado por',
        ];
    }

    /**
     * Gets query for [[Gait]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGait()
    {
        return $this->hasOne(Gaits::class, ['id' => 'gait_id']);
    }

    public function getVariableValues()
    {
        return $this->hasMany(\app\models\EquineVariableValues::class, ['equine_id' => 'id'])
            ->with(['subcategory.category', 'variable']);
    }

}
