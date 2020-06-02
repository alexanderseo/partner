<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 *
 * @package app\models
 *
 * @property int $id
 * @property string $name
 * @property string $password_hash
 * @property string $auth_key
 * @property string $mail
 * @property string $role
 * @property int $created_at
 * @property int $updated_at
 */

class User extends ActiveRecord implements IdentityInterface
{
    public static function create($name, $password, $mail, $role)
    {
        $user = new self();

        $user->name = $name;
        $user->password_hash = Yii::$app->security->generatePasswordHash($password);
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->mail = $mail;
        $user->role = $role;

        return $user;
    }

    public static function getAuthUser($mail, $password)
    {
        $user = self::findOne(['mail' => $mail]);

        if (!$user) return null;
        if (!Yii::$app->security->validatePassword($password, $user->password_hash)) return null;

        return $user;
    }

    public static function tableName()
    {
        return '{{%users}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    // IdentityInterface
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($key)
    {
        return $this->auth_key === $key;
    }
}
