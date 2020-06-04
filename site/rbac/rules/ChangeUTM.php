<?php

namespace app\rbac\rules;

use app\models\Partner;
use app\models\User;
use Yii;
use yii\rbac\Rule;

class ChangeUTM extends Rule
{
    public $name = 'changeUTM';

    /**
     * @var User $user
     * @return boolean
     */

    public function execute($user, $item, $params)
    {
        /** @var Partner $partner */
        $partner = $role = Yii::$app->user->identity->partner;

        if (!$partner) return false;
        if ($partner->utm_changed) return false;

        return true;
    }
}