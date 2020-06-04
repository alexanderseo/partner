<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = $model->user->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="box">
    <div class="box-body">
        <p>
            <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Удалить?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'label' => 'Имя',
                    'value' => function($partner) {
                        return $partner->user->name;
                    },
                ],
                [
                    'label' => 'E-mail',
                    'value' => function($partner) {
                        return $partner->user->mail;
                    },
                ],
                [
                    'label' => 'Сайт',
                    'value' => function($partner) {
                        return $partner->site;
                    },
                ],
                [
                    'label' => 'UTM',
                    'value' => function($partner) {
                        return $partner->utm;
                    },
                ],
            ],
        ]) ?>
    </div>
</div>