<?php

use app\rbac\Roles;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \app\models\User $user */
/** @var \app\models\forms\UTM $form */

$this->title = 'Профиль';

?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Информация</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="row margin-bottom-md">
            <div class="col-sm-2 text-right"><b>Имя</b></div>
            <div class="col-sm-10"><?= $user->name ?></div>
        </div>
        <div class="row margin-bottom-md">
            <div class="col-sm-2 text-right"><b>E-mail</b></div>
            <div class="col-sm-10"><?= $user->mail ?></div>
        </div>
        <?php if ($user->partner): ?>
            <div class="row margin-bottom-md">
                <div class="col-sm-2 text-right"><b>UTM</b></div>
                <div class="col-sm-10"><?= $user->partner->utm ?></div>
            </div>
        <?php endif ?>
    </div>
</div>

<?php if (Roles::can(Roles::PERMISSION_CHANGE_UTM)): ?>

    <?php $activeForm = ActiveForm::begin() ?>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Сменить utm-метку</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <p class="bg-danger padding-md">Внимание! Только однократное изменение</p>
            <?= $activeForm->field($form, 'utm')->label('Новая метка') ?>
            <?= Html::submitButton('Сменить', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>

<?php endif ?>