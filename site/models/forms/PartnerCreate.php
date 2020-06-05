<?php

namespace app\models\forms;

use yii\base\Model;

class PartnerCreate extends Model
{
    public $name;
    public $mail;
    public $site;
    public $utm;
    public $password;
    public $type;

    public function rules()
    {
        return [
            ['name', 'string'],
            ['name', 'required'],

            ['mail', 'string'],
            ['mail', 'required'],

            ['site', 'string'],
            ['site', 'required'],

            ['utm', 'string'],
            ['utm', 'required'],
            ['utm', 'unique', 'targetClass' => \app\models\Partner::class, 'targetAttribute' => 'utm'],

            ['password', 'string', 'min' => 6],
            ['password', 'required'],

            ['type', 'integer'],
            ['type', 'required'],
        ];
    }
}
