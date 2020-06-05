<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form \app\models\forms\PartnerCreate */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="box">
    <div class="box-body">

        <?php $activeForm = ActiveForm::begin(); ?>

        <?= $activeForm->field($form, 'name')->textInput()->label('Имя') ?>
        <?= $activeForm->field($form, 'mail')->textInput()->label('E-mail') ?>
        <?= $activeForm->field($form, 'site')->textInput()->label('Сайт') ?>
        <?= $activeForm->field($form, 'utm')->textInput()->label('UTM') ?>
        <?= $activeForm->field($form, 'password')->textInput(['minlength' => true])->label('Пароль') ?>
        <?= $activeForm->field($form, 'type')->dropDownList([
            1 => 'По регистрации',
            2 => 'По выручке',
        ])->label('Тип отчетов') ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>