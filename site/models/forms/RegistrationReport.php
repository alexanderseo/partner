<?php

namespace app\models\forms;

use app\rbac\Roles;
use yii\base\Model;

class RegistrationReport extends Model
{
    public $from;
    public $to;
    public $utm;

    public function rules()
    {
        $rules = [
            ['from', 'string'],
            ['from', 'required'],

            ['to', 'string'],
            ['to', 'required'],
        ];

        if (Roles::isAdmin()) {
            $rules[] = ['utm', 'string'];
            $rules[] = ['utm', 'required'];
        }

        return $rules;
    }
}
