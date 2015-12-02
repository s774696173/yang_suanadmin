<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testlogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testlog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Testlog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'method',
            'create_time',
            'c1',
            // 'c2',
            // 'c3',
            // 'c4',
            // 'c5',
            // 'c6:ntext',
            // 'c7',
            // 'c8',
            // 'c9',
            // 'c10',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
