<?php

namespace app\rbac;

use Yii;

class Roles
{
    const ROLE_ADMIN = 'admin';
    const ROLE_PARTNER = 'partner';

    const PERMISSION_CHANGE_UTM = 'changeUTM';

    public static function getAllRoles()
    {
        return [
            self::ROLE_ADMIN => self::ROLE_ADMIN,
            self::ROLE_PARTNER => self::ROLE_PARTNER
        ];
    }

    public static function isAdmin()
    {
        if (Yii::$app->user->isGuest) return false;
        return Yii::$app->user->can(self::ROLE_ADMIN);
    }

    public static function isPartner()
    {
        if (Yii::$app->user->isGuest) return false;
        return Yii::$app->user->can(self::ROLE_PARTNER);
    }
}