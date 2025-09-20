<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sara_search_history".
 *
 * @property int $id ID
 * @property string|null $created_by Creado por
 * @property string $nombre_yegua Nombre de la Yegua
 * @property int|null $gait_id Andar
 * @property string $variables Variables selccionadas
 * @property string $chk Mejoramiento seleccionado
 * @property string|null $created Creado
 *
 * @property Gaits $gait
 */
class SaraSearchHistory extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sara_search_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'gait_id', 'created'], 'default', 'value' => null],
            [['nombre_yegua', 'variables', 'chk'], 'required'],
            [['gait_id'], 'integer'],
            [['variables', 'chk', 'created'], 'safe'],
            [['created_by'], 'string', 'max' => 50],
            [['nombre_yegua'], 'string', 'max' => 255],
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
            'created_by' => 'Creado por',
            'nombre_yegua' => 'Nombre de la Yegua',
            'gait_id' => 'Andar',
            'variables' => 'Variables selccionadas',
            'chk' => 'Mejoramiento seleccionado',
            'created' => 'Creado',
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

}
