<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Class Partner
 *
 * @package app\models
 *
 * @property int $id
 * @property int $user_id
 * @property string $site
 * @property string $utm
 * @property int $utm_changed
 * @property int $type
 * @property int $created_at
 * @property int $updated_at
 */

class Partner extends ActiveRecord
{
    public function changeUTM($utm)
    {
        $this->utm = $utm;
        $this->utm_changed++;
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public static function tableName()
    {
        return '{{%partners}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
}
