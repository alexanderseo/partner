<?php

namespace app\models\forms;

use yii\base\Model;

class Login extends Model
{
    public $mail;
    public $password;
    public $rememberMe = true;

    public function rules()
    {
        return [
            ['mail', 'string'],
            ['mail', 'required'],

            ['password', 'string'],
            ['password', 'required'],

            ['rememberMe', 'boolean'],
        ];
    }
}
