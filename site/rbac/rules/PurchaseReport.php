<?php

namespace app\rbac\rules;

use app\models\User;
use app\rbac\Roles;
use Yii;
use yii\rbac\Rule;

class PurchaseReport extends Rule
{
    public $name = Roles::PERMISSION_PURCHASE_REPORT;

    public function execute($user, $item, $params)
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;

        if (!$user) return false;

        if (Roles::isAdmin()) return true;
        if ($user->partner && $user->partner->isPurchaseType()) return true;

        return false;
    }
}