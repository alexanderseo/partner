<?php

namespace app\rbac\rules;

use app\rbac\Roles;
use Yii;
use yii\rbac\Rule;

class UserRole extends Rule
{
    public $name = 'userRole';

    public function execute($user, $item, $params)
    {
        if (Yii::$app->user->isGuest) return false;

        $role = Yii::$app->user->identity->role;

        if ($item->name === Roles::ROLE_ADMIN) {
            return $role === Roles::ROLE_ADMIN;
        }

        if ($item->name === Roles::ROLE_PARTNER) {
            return $role === Roles::ROLE_PARTNER;
        }

        return false;
    }
}