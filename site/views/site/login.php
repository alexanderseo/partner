<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\forms\Login */
/* @var $wrong boolean */

$this->title = 'Партнеры';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Авторизация</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Войдите на сайт, чтобы начать сеанс</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'mail', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => 'E-mail']) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => 'Пароль']) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox(['label' => 'Запомнить меня']) ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
        <?php if ($wrong): ?>
            <p class="text-danger" style="margin-bottom: 0;">Неправильно введены e-mail или пароль</p>
        <?php endif ?>

        <!--
        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>
        -->

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
