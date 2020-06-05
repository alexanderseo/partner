<?php

namespace app\services;

use app\models\forms\RegistrationReport;
use app\models\Partner;
use app\models\WebUserSourceTraking;
use app\rbac\Roles;

class RegistrationCountService
{
    public function getCount(RegistrationReport $form)
    {
        $from = \DateTime::createFromFormat('d-m-Y', $form->from);
        $from = $from->format('Y-m-d');
        $from = $from . ' 00:00:00';

        $to = \DateTime::createFromFormat('d-m-Y', $form->to);
        $to = $to->format('Y-m-d');
        $to = $to . ' 23:59:59';

        if (Roles::isAdmin()) {
            $utm = $form->utm;
        } else {
            $utm = Partner::getCurrentUTM();
        }

        $result = WebUserSourceTraking::find()
            ->where(['utm_source' => $utm])
            ->andFilterWhere(['between', 'transition_ts', $from, $to])
            ->count();

        return $result;
    }

    public function getAllUTM()
    {
        return Partner::find()->select('site')->distinct()->indexBy('utm')->column();
    }
}