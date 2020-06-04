<?php

namespace app\rbac\rules;

use app\models\Partner;
use Yii;
use yii\rbac\Rule;

class ChangeUTM extends Rule
{
    public $name = 'changeUTM';

    public function execute($user, $item, $params)
    {
        /** @var Partner $partner */
        $partner = Yii::$app->user->identity->partner;

        if (!$partner) return false;
        if ($partner->utm_changed) return false;

        return true;
    }
}