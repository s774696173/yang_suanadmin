<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Testlog */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Testlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testlog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'method',
            'create_time',
            'c1',
            'c2',
            'c3',
            'c4',
            'c5',
            'c6:ntext',
            'c7',
            'c8',
            'c9',
            'c10',
        ],
    ]) ?>

</div>
