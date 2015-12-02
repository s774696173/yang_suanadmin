<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Testlog */

$this->title = 'Create Testlog';
$this->params['breadcrumbs'][] = ['label' => 'Testlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testlog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
