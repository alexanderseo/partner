<?php

namespace app\controllers;

use app\rbac\Roles;
use Yii;
use app\models\Partner;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PartnersController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [Roles::ROLE_ADMIN],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Partner::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $form = new \app\models\forms\Partner();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $id = Partner::create($form);
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('create', [
            'form' => $form,
        ]);
    }

    public function actionUpdate($id)
    {
        $partner = $this->findModel($id);
        $form = new \app\models\forms\Partner([
            'name' => $partner->user->name,
            'mail' => $partner->user->mail,
            'site' => $partner->site,
            'utm' => $partner->utm,
            'type' => $partner->type,
        ]);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $id = $partner->updatePartner($form);
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'form' => $form,
        ]);
    }

    public function actionDelete($id)
    {
        $partner = $this->findModel($id);
        $user = $partner->user;
        $partner->delete();
        $user->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Partner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Страница не найдена.');
    }
}
