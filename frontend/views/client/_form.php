<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\jui\DatePicker;


/** @var yii\web\View $this */
/** @var frontend\models\Client $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'gender')->dropDownList(
    ['1' => 'Male', '2' => 'Female'], // Options
    ['prompt' => 'Select Gender'] // Prompt
) ?>

<?= $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [
    //'model' => $model,
    //'attribute' => 'date_of_birth',
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class' => 'form-control'],
]) ?>

    <!-- <?= $form->field($model, 'date_of_creation')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'update_date')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'deletion_date')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
