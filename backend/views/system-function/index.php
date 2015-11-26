<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SystemFunctionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Functions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-function-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create System Function', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'func_name',
            'module_id',
            'display_label',
            // 'des',
            // 'display_order',
            // 'entry_right_name',
            // 'entry_url:url',
            // 'has_lef',
            // 'create_user',
            // 'create_date',
            // 'update_user',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
