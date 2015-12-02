<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Testlog */

$this->title = 'Update Testlog: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Testlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testlog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
