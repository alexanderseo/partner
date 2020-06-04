<?php

/* @var $this yii\web\View */
/* @var $form \app\models\forms\Partner */

$this->title = 'Обновить: ' . $model->user->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>

<div class="box">
    <div class="box-body">

        <?= $this->render('_form', [
            'form' => $form,
        ]) ?>

    </div>
</div>
