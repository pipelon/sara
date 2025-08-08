<?php

namespace app\models;

use yii\db\mssql\PDO;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
	public $fullName;
        public $profile_image;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id) {
        $fnIdentity = \Yii::$app->session['fnIdentity'];
        if (empty($fnIdentity)) {
            $sql = "SELECT id, username, "
                    . "username as authKey, username as accessToken, "
                    . "name as fullName, password "
                    . "FROM users u "
                    . "WHERE id = :id";
            $command = \Yii::$app->db->createCommand($sql);
            $command->bindParam(":id", $id, PDO::PARAM_STR);
            $user = $command->queryOne();
            \Yii::$app->session['fnIdentity'] = $user;
        } else {
            $user = \Yii::$app->session['fnIdentity'];
        }

        if ($user) {
            return new static($user);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        $sql = "SELECT id, username, "
                . "username as authKey, username as accessToken, "
                . "name as fullName, password "
                . "FROM users u "
                . "WHERE username = :username AND active = 1";
        $command = \Yii::$app->db->createCommand($sql);
        $command->bindParam(":username", $username, PDO::PARAM_STR);
        $user = $command->queryOne();

        if ($user) {
            return new static($user);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
	
	/**
     * Retorna el nombre completo del usuario registrado
     * 
     * @return string     
     * @license http://www.opensource.org/licenses/bsd-license.php  BSD License
     * @version Release: $Id$
     */
    public function getFullName() {
        return $this->fullName;
    }
	
	/**
     * Retorna los roles de un usuario
     * 
     * @return string     
     * @license http://www.opensource.org/licenses/bsd-license.php  BSD License
     * @version Release: $Id$
     */
    public function getRoles() {
        return \Yii::$app->authManager->getRolesByUser(\Yii::$app->user->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->password === md5($password);
    }
}
