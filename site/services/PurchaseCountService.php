<?php

namespace app\services;

use app\models\forms\PurchaseReport;
use app\models\Partner;
use app\models\WebUserPurchases;
use app\models\WebUserSourceTraking;
use app\rbac\Roles;

class PurchaseCountService
{

    public function getPurchase(PurchaseReport $form)
    {
        $from = \DateTime::createFromFormat('d-m-Y H:i:s', $form->from . ' 00:00:00');
        $from = $from->getTimestamp();

        $to = \DateTime::createFromFormat('d-m-Y H:i:s', $form->to . ' 23:59:59');
        $to = $to->getTimestamp();

        if (Roles::isAdmin()) {
            $utm = $form->utm;
        } else {
            $utm = Partner::getCurrentUTM();
        }

        $ids = WebUserSourceTraking::find()
            ->where(['utm_source' => $utm])
            ->select('web_user_id')->column();

        $purchase = WebUserPurchases::find()
            ->where(['web_user_id' => $ids])
            ->andWhere(['state' => 1])
            ->andWhere(['>=', 'created', $from])
            ->andWhere(['<=', 'created', $to])
            ->select(['currency_id', 'payment_amount'])
            ->asArray()->all();

        $result = [];
        foreach ($purchase as $item) {
            $currency = Partner::getCurrencyName($item['currency_id']);
            $amount = $item['payment_amount'];
            if (empty($result[$currency])) $result[$currency] = [
                'total' => 0,
                'count' => 0,
            ];
            $result[$currency]['total'] += $amount;
            $result[$currency]['count'] ++;
        }

        return $result;
    }
}