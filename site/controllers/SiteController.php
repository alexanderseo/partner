<?php

namespace app\controllers;

use app\models\User;
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
        if (Yii::$app->user->isGuest) {
            $this->layout = 'main-login';

            $model = new Login();

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $user = User::getAuthUser($model->mail, $model->password);

                if (!$user) {
                    Yii::$app->session->setFlash('error', 'Неправильно введены e-mail или пароль');
                    return $this->goBack();
                }

                Yii::$app->user->login($user, $model->rememberMe ? 3600 * 24 * 30 : 0);
                return $this->goBack();
            }

            return $this->render('login', [
                'model' => $model,
            ]);
        } else {
            return $this->render('profile');
        }

    }

    public function actionReport1()
    {
        return $this->render('report1');
    }

    public function actionReport2()
    {
        return $this->render('report2');
    }

    public function actionPartners()
    {
        return $this->render('partners');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
