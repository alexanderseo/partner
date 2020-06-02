<?php

namespace app\commands;

use app\rbac\Roles;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class RoleController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->getAuthManager();
        $auth->removeAll();

        $rule = new \app\rbac\rules\UserRole();
        $auth->add($rule);

        $registrationReport = $auth->createPermission('registrationReport');
        $auth->add($registrationReport);

        $purchaseReport = $auth->createPermission('purchaseReport');
        $auth->add($purchaseReport);

        $admin = $auth->createRole(Roles::ROLE_ADMIN);
        $admin->ruleName = $rule->name;
        $auth->add($admin);

        $partner = $auth->createRole(Roles::ROLE_PARTNER);
        $partner->ruleName = $rule->name;
        $auth->add($partner);

        //$auth->addChild($admin, $partner);
        $auth->addChild($partner, $purchaseReport);

        $this->stdout('Done!' . PHP_EOL);

        return ExitCode::OK;
    }
}
