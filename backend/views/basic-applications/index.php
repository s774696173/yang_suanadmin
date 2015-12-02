<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Basic Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-applications-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Basic Applications', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'name',
            'url:url',
            'authkey',
            // 'isencryptapidata',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
