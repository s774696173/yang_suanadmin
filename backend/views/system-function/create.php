<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SystemFunction */

$this->title = 'Create System Function';
$this->params['breadcrumbs'][] = ['label' => 'System Functions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-function-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
