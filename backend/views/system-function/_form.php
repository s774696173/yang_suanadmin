<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SystemFunction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-function-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'func_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'module_id')->textInput() ?>

    <?= $form->field($model, 'display_label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'display_order')->textInput() ?>

    <?= $form->field($model, 'entry_right_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entry_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_lef')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'update_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'update_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
