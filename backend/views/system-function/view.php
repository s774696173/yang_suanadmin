<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SystemFunction */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'System Functions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-function-view">

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
            'code',
            'func_name',
            'module_id',
            'display_label',
            'des',
            'display_order',
            'entry_right_name',
            'entry_url:url',
            'has_lef',
            'create_user',
            'create_date',
            'update_user',
            'update_date',
        ],
    ]) ?>

</div>
