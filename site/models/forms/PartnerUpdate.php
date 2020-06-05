<?php

namespace app\models\forms;

use yii\base\Model;

class PartnerUpdate extends Model
{
    public $id;
    public $name;
    public $mail;
    public $site;
    public $utm;
    public $password;
    public $type;

    public function rules()
    {
        return [
            ['id', 'integer'],
            ['id', 'required'],

            ['name', 'string'],
            ['name', 'required'],

            ['mail', 'string'],
            ['mail', 'required'],

            ['site', 'string'],
            ['site', 'required'],

            ['utm', 'string'],
            ['utm', 'required'],
            [
                'utm',
                'unique',
                'targetClass' => \app\models\Partner::class,
                'targetAttribute' => 'utm',
                'filter' => function($query) {
                    $query->andWhere(['not', 'id' => $this->id]);
                }
            ],

            ['password', 'string'],

            ['type', 'integer'],
            ['type', 'required'],
        ];
    }
}
