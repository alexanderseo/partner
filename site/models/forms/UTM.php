<?php

namespace app\models\forms;

use app\models\Partner;
use yii\base\Model;

class UTM extends Model
{
    public $utm;

    public function rules()
    {
        return [
            ['utm', 'string'],
            ['utm', 'required'],
            ['utm', 'unique', 'targetClass' => Partner::class, 'targetAttribute' => 'utm']
        ];
    }
}