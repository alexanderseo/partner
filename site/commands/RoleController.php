<?php

namespace app\commands;

use app\rbac\Roles;
use app\rbac\rules\ChangeUTM;
use app\rbac\rules\PurchaseReport;
use app\rbac\rules\RegistrationReport;
use app\rbac\rules\UserRole;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class RoleController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->getAuthManager();
        $auth->removeAll();

        $userRole = new UserRole();
        $auth->add($userRole);

        $changeUTM = new ChangeUTM();
        $auth->add($changeUTM);

        $registrationReport = new RegistrationReport();
        $auth->add($registrationReport);

        $registrationReportPermission = $auth->createPermission(Roles::PERMISSION_REGISTRATION_REPORT);
        $registrationReportPermission->ruleName = $registrationReport->name;
        $auth->add($registrationReportPermission);

        $purchaseReport = new PurchaseReport();
        $auth->add($purchaseReport);

        $purchaseReportPermission = $auth->createPermission(Roles::PERMISSION_PURCHASE_REPORT);
        $purchaseReportPermission->ruleName = $purchaseReport->name;
        $auth->add($purchaseReportPermission);

        $changeUTMpermission = $auth->createPermission(Roles::PERMISSION_CHANGE_UTM);
        $changeUTMpermission->ruleName = $changeUTM->name;
        $auth->add($changeUTMpermission);

        $admin = $auth->createRole(Roles::ROLE_ADMIN);
        $admin->ruleName = $userRole->name;
        $auth->add($admin);

        $partner = $auth->createRole(Roles::ROLE_PARTNER);
        $partner->ruleName = $userRole->name;
        $auth->add($partner);

        $auth->addChild($partner, $registrationReportPermission);
        $auth->addChild($admin, $registrationReportPermission);

        $auth->addChild($partner, $purchaseReportPermission);
        $auth->addChild($admin, $purchaseReportPermission);

        $auth->addChild($partner, $changeUTMpermission);

        $this->stdout('Done!' . PHP_EOL);

        return ExitCode::OK;
    }
}
