<?php

/* @var $this yii\web\View */

$this->title = 'Профиль';
?>

<form class="form-horizontal">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Имя</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Имя">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Utm-метка</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Utm-метка">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Тип программы</label>
        <div class="col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Регистрации
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Покупки
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
</form>