<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class WebUserSourceTraking
 *
 * @package app\models
 *
 * @property int $id
 * @property int $web_user_id
 * @property string $utm_source
 * @property string $utm_campaign
 * @property string $utm_term
 * @property string $utm_content
 * @property string $utm_medium
 * @property \DateTime $transition_ts
 */

class WebUserSourceTraking extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%web_user_source_traking}}';
    }
}