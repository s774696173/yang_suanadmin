<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BasicApplications */

$this->title = 'Create Basic Applications';
$this->params['breadcrumbs'][] = ['label' => 'Basic Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-applications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
