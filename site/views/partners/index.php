<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Партнеры';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-body">
        <p>
            <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => 'Имя',
                    'value' => function ($data) {
                        return $data->user->name;
                    },
                ],
                [
                    'label' => 'E-mail',
                    'value' => function ($data) {
                        return $data->user->mail;
                    },
                ],
                [
                    'label' => 'Сайт',
                    'value' => function ($data) {
                        return $data->site;
                    },
                ],
                [
                    'label' => 'UTM',
                    'value' => function ($data) {
                        return $data->utm;
                    },
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>
