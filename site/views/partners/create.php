<?php

/* @var $this yii\web\View */
/* @var $form \app\models\forms\Partner */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="box">
    <div class="box-body">

        <?= $this->render('_form', [
            'form' => $form,
        ]) ?>

    </div>
</div>