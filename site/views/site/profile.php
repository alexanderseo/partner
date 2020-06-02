<?php

/** @var yii\web\View $this */
/** @var \app\models\User $user */

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
        <div class="row">
            <div class="col-sm-2 text-right"><b>E-mail</b></div>
            <div class="col-sm-10"><?= $user->mail ?></div>
        </div>
    </div>
</div>

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
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Новая метка</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="utm">
            </div>
            <button type="submit" class="btn btn-default">Сменить</button>
        </form>
    </div>
</div>