<?php

/** @var yii\web\View $this */
/** @var \app\models\forms\PurchaseReport $form */
/** @var array $purchase */
/** @var array $utm */
/** @var array $total */

use app\rbac\Roles;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Отчет по покупкам';
?>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Параметры отчета</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <?php $activeForm = ActiveForm::begin() ?>
            <?php if (Roles::isAdmin()): ?>
                <?= $activeForm->field($form, 'utm')->dropDownList($utm)->label('Сайт') ?>
            <?php endif ?>

            <div class="row margin-bottom-md">
                <div class="col-sm-6">
                    <?= DatePicker::widget([
                        'language' => 'ru',
                        'name' => 'PurchaseReport[from]',
                        'value' => $form->from,
                        'type' => DatePicker::TYPE_RANGE,
                        'name2' => 'PurchaseReport[to]',
                        'value2' => $form->to,
                        'separator' => 'по',

                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy',
                        ]
                    ]) ?>
                </div>
            </div>
            <?= Html::submitButton('Обновить', ['class' => 'btn btn-default']) ?>

            <?php ActiveForm::end() ?>
        </div>
    </div>

<?php if ($form->utm): ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Отчет</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <p class="margin-bottom-md">Покупки с <?= $form->from ?> по <?= $form->to ?> с utm-меткой <b><?= $form->utm ?></b></p>
            <?php foreach ($purchase as $currency => $item): ?>
                <p><?= $item['count'] ?> шт., <b><?= $item['total'] ?> <?= $currency ?></b></p>
            <?php endforeach ?>

            <?php if (!count($purchase)): ?>
                <p>Покупки отсутствуют</p>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>

<?php if (Roles::isAdmin() && $total): ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Итого с <?= $form->from ?> по <?= $form->to ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <tr>
                    <th>Метка</th>
                    <th>Валюта</th>
                    <th>Покупок</th>
                    <th>Сумма</th>
                </tr>
                <?php foreach ($total as $utm => $item): ?>
                    <?php foreach ($item as $currency => $values): ?>
                        <tr>
                            <td><?= $utm ?></td>
                            <td><?= $currency ?></td>
                            <td><?= $values['total'] ?></td>
                            <td><?= $values['count'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>
<?php endif ?>