<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id ID
 * @property string $name Nombre
 * @property string $username Usuario
 * @property string $password Clave
 * @property string $email Correo electrónico
 * @property int $active Activo
 * @property string $created Creado
 * @property string $created_by Creado por
 * @property string $modified Modificado
 * @property string $modified_by Modificado por
 *
 * @property Sales[] $sales
 */
class Users extends BeforeModel {
    
    public $password_repeat;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'username', 'email', 'active'], 'required'],
            [['password', 'password_repeat'], 'required', 'on' => ['create']],
            [['active'], 'integer'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'operator' => '=='],
            ['username', 'match', 'not' => true, 'pattern' => '/[^a-z0-9._-]/',
                'on' => ['create', 'update'],
                'message' => 'No se permiten espacios o caracteres especiales'],
            [['created', 'modified'], 'safe'],
            [['name', 'password', 'email'], 'string', 'max' => 100],
            [['username', 'created_by', 'modified_by'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'username' => 'Usuario',
            'password' => 'Clave',
            'password_repeat' => 'Repetir clave',
            'email' => 'Correo electrónico',
            'active' => 'Activo',
            'created' => 'Creado',
            'created_by' => 'Creado por',
            'modified' => 'Modificado',
            'modified_by' => 'Modificado por',
        ];
    }
    
    public static function findIdentity($id) {
        return Users::findOne($id);
    }

}
