<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Testlog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testlog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'method')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'c1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c2')->textInput() ?>

    <?= $form->field($model, 'c3')->textInput() ?>

    <?= $form->field($model, 'c4')->dropDownList([ 'a' => 'A', 'b' => 'B', 'c' => 'C', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'c5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c6')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'c7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c8')->textInput() ?>

    <?= $form->field($model, 'c9')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c10')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
