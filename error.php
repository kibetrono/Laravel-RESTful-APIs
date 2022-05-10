<?php

use app\common\models\Constituency;
use app\common\models\ConstituencyElectiveVacancies;
use app\common\models\ElectivePosition;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model ConstituencyElectiveVacancies */
/* @var $form ActiveForm */
?>

<div class="constituency-elective-vacancies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'constituency_id')->textInput() ?>
    <?=
    $form->field($model, 'constituency_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Constituency::find()->all(), 'id', function($model) {
                    return $model->name . ' (' . $model->county->name . ' County)';
                }),
        'options' => [
            'placeholder' => '--- Select Constituency ---',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?php // $form->field($model, 'elective_position_id')->textInput() ?>
    <?=
    $form->field($model, 'elective_position_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(ElectivePosition::find()->where(['LIKE', 'name', 'Member of Parliament'])->all(), 'id', function($model) {
                    return $model->name;
                }),
        'options' => [
            'placeholder' => '--- Select Elective Position ---',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'election_date')->widget(DatePicker::classname(), [
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'status')->dropDownList(
            [1 => 'Open', 0 => 'Closed'])
    ?>

    <?php // $form->field($model, 'date_added')->textInput() ?>

    <?php // $form->field($model, 'date_updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
