<?php

namespace app\models;

use app\rbac\Roles;
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
    const TYPE_REGISTRATION = 1;
    const TYPE_PURCHASE = 2;

    public static function getCurrentUTM()
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;
        if (!$user) return '';

        $partner = $user->partner;
        if (!$partner) return '';

        return $partner->utm;
    }

    public static function create(\app\models\forms\Partner $form)
    {
        $user = User::create($form->name, $form->password, $form->mail, Roles::ROLE_PARTNER);
        $user->save();

        $partner = new self();
        $partner->user_id = $user->id;
        $partner->site = $form->site;
        $partner->utm = $form->utm;
        $partner->utm_changed = 0;
        $partner->type = $form->type;
        $partner->save();
        return $partner->id;
    }

    public function updatePartner(\app\models\forms\Partner $form)
    {
        $this->site = $form->site;
        $this->utm = $form->utm;
        $this->type = $form->type;
        $this->save();

        $this->user->name = $form->name;
        $this->user->password_hash = Yii::$app->security->generatePasswordHash($form->password);
        $this->user->auth_key = Yii::$app->security->generateRandomString();
        $this->user->mail = $form->mail;
        $this->user->save();
    }

    public function changeUTM($utm)
    {
        $this->utm = $utm;
        $this->utm_changed++;
    }

    public static function getCurrencyName($currency_id)
    {
        $currency = [
            1 => 'Российский рубль',
            2 => 'Украинская гривна',
            3 => 'Доллар США',
            4 => 'Евро',
            5 => 'Белорусский рубль',
            6 => 'Казахская тенге',
        ];
        if (!empty($currency[$currency_id])) return $currency[$currency_id];
        return null;
    }

    public function isRegistrationType()
    {
        return $this->type === self::TYPE_REGISTRATION;
    }

    public function isPurchaseType()
    {
        return $this->type === self::TYPE_PURCHASE;
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
