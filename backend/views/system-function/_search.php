<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SystemFunctionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-function-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'func_name') ?>

    <?= $form->field($model, 'module_id') ?>

    <?= $form->field($model, 'display_label') ?>

    <?php // echo $form->field($model, 'des') ?>

    <?php // echo $form->field($model, 'display_order') ?>

    <?php // echo $form->field($model, 'entry_right_name') ?>

    <?php // echo $form->field($model, 'entry_url') ?>

    <?php // echo $form->field($model, 'has_lef') ?>

    <?php // echo $form->field($model, 'create_user') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_user') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
