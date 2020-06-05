<?php

/** @var yii\web\View $this */
/** @var \app\models\forms\RegistrationReport $form */
/** @var int $count */
/** @var array $utm */

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Отчет по регистрациям';
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
        <?php if (\app\rbac\Roles::isAdmin()): ?>
            <?= $activeForm->field($form, 'utm')->dropDownList($utm)->label('Сайт') ?>
        <?php endif ?>

        <div class="row margin-bottom-md">
            <div class="col-sm-6">
                <?= DatePicker::widget([
                    'language' => 'ru',
                    'name' => 'RegistrationReport[from]',
                    'value' => $form->from,
                    'type' => DatePicker::TYPE_RANGE,
                    'name2' => 'RegistrationReport[to]',
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
        <?= $count ?> регистраций с <?= $form->from ?> по <?= $form->to ?> с utm-меткой <b><?= $form->utm ?></b>
    </div>
</div>
<?php endif ?>