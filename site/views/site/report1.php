<?php

/* @var $this yii\web\View */

$this->title = 'Отчет по регистрациям';
?>

<form class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">Имя партнера</label>
        <div class="col-sm-2">
            <select class="form-control">
                <option>Партнер 1</option>
                <option>Партнер 2</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">UTM-метка</label>
        <div class="col-sm-2">
            <select class="form-control">
                <option>Метка 1</option>
                <option>Метка 2</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Период</label>
        <div class="col-sm-2">
            <div class="input-group">
            <div class="input-group-addon">с</div>
            <input type="text" class="form-control" id="exampleInputAmount" placeholder="<?= date('Y-m-d') ?>">
                </div>
        </div>
        <div class="col-sm-2">
            <div class="input-group">
            <div class="input-group-addon">по</div>
            <input type="text" class="form-control" id="exampleInputAmount" placeholder="<?= date('Y-m-d') ?>">
                </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">Сформировать отчет</button>
        </div>
    </div>
</form>