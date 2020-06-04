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

        $userRole = new \app\rbac\rules\UserRole();
        $auth->add($userRole);

        $changeUTM = new \app\rbac\rules\ChangeUTM();
        $auth->add($changeUTM);

        $registrationReport = $auth->createPermission('registrationReport');
        $auth->add($registrationReport);

        $purchaseReport = $auth->createPermission('purchaseReport');
        $auth->add($purchaseReport);

        $changeUTMpermission = $auth->createPermission(Roles::PERMISSION_CHANGE_UTM);
        $changeUTMpermission->ruleName = $changeUTM->name;
        $auth->add($changeUTMpermission);

        $admin = $auth->createRole(Roles::ROLE_ADMIN);
        $admin->ruleName = $userRole->name;
        $auth->add($admin);

        $partner = $auth->createRole(Roles::ROLE_PARTNER);
        $partner->ruleName = $userRole->name;
        $auth->add($partner);

        //$auth->addChild($admin, $partner);
        $auth->addChild($partner, $purchaseReport);
        $auth->addChild($partner, $registrationReport);
        $auth->addChild($partner, $changeUTMpermission);

        $this->stdout('Done!' . PHP_EOL);

        return ExitCode::OK;
    }
}
