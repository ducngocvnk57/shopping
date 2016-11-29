<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'fullname',
            'phone',
            'email:email',
            'address',
            [
                  'label' => 'Status',
                  'attribute' => 'status',
                  'value' => function($model){
                    switch($model->status){
                      case 0 : return "new";
                      break;
                      case 1 : return "viewed";
                      break;
                      default : return "viewed";
                    }
                  }
            ],
            ['class' => 'yii\grid\ActionColumn','template' => '{view} {delete}'],
        ],
    ]); ?>
</div>
