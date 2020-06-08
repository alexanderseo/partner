<?php

namespace app\controllers;

use app\models\forms\PurchaseReport;
use app\models\forms\RegistrationReport;
use app\models\forms\UTM;
use app\models\Partner;
use app\models\User;
use app\rbac\Roles;
use app\services\PurchaseCountService;
use app\services\RegistrationCountService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\forms\Login;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $form = new UTM();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            /** @var Partner $partner */
            $partner = Yii::$app->user->identity->partner;
            $partner->changeUTM($form->utm);
            $partner->save();
            return $this->refresh();
        }

        return $this->render('profile', [
            'user' => Yii::$app->user->identity,
            'form' => $form,
        ]);
    }

    public function actionRegistrationReport()
    {
        $form = new RegistrationReport([
            'from' => '01-01-2000',
            'to' => date('d-m-Y'),
            'utm' => Partner::getCurrentUTM()
        ]);

        $service = new RegistrationCountService();

        $utm = [];
        if (Roles::isAdmin()) {
            $utm = $service->getAllUTM();
        }

        $form->load(Yii::$app->request->post()) && $form->validate();
        if (Roles::isAdmin() && !$form->utm) {
            $form->utm = array_keys($utm)[0];
        }

        $count = $service->getCount($form);
        $total = $service->getTotal($form);

        return $this->render('registration-report', [
            'form' => $form,
            'count' => $count,
            'utm' => $utm,
            'total' => $total,
        ]);
    }

    public function actionPurchaseReport()
    {
        $form = new PurchaseReport([
            'from' => '01-01-2000',
            'to' => date('d-m-Y'),
            'utm' => Partner::getCurrentUTM()
        ]);

        $registrationService = new RegistrationCountService();
        $purchaseService = new PurchaseCountService();

        $utm = [];
        if (Roles::isAdmin()) {
            $utm = $registrationService->getAllUTM();
        }

        $form->load(Yii::$app->request->post()) && $form->validate();
        if (Roles::isAdmin() && !$form->utm) {
            $form->utm = array_keys($utm)[0];
        }

        $purchase = $purchaseService->getPurchase($form);
        $total = $purchaseService->getTotal($form);

        return $this->render('purchase-report', [
            'form' => $form,
            'purchase' => $purchase,
            'utm' => $utm,
            'total' => $total,
        ]);
    }

    public function actionLogin()
    {
        $this->layout = 'main-login';

        $model = new Login();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = User::getAuthUser($model->mail, $model->password);

            if (!$user) {
                return $this->render('login', [
                    'model' => $model,
                    'wrong' => true,
                ]);
            }

            Yii::$app->user->login($user, $model->rememberMe ? 3600 * 24 * 30 : 0);
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
            'wrong' => false
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
