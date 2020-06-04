<?php


namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class WebUserPurchases
 *
 * @package app\models
 *
 * @property int $id
 * @property int $web_user_id
 * @property int $subscription_id
 * @property int $subscription_expires
 * @property int $course_id
 * @property int $issue_id
 * @property int $package_id
 * @property int $exam_id
 * @property int $exam_left
 * @property string $issue_ios_key
 * @property string $issue_andriod_key
 * @property string $transaction_receipt
 * @property int $gift
 * @property int $state
 * @property string $pay_service
 * @property int $platform_id
 * @property int $currency_id
 * @property double $cost
 * @property double $discount
 * @property double $payment_amount
 * @property int $payment_date
 * @property string $list_discounts
 * @property int $reference_id
 * @property int $capchup_after_10_min
 * @property int $catchup_next_day
 * @property int $subscription_end
 * @property int $created
 * @property int $modified
 */

class WebUserPurchases extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%web_user_purchases}}';
    }
}