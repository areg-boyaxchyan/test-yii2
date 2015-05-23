<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderDescSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Descs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-desc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <a class="btn btn-success" href="/web/index.php?r=order/create">Create Order Desc</a>
        <a class="btn btn-success" href="/web/index.php?r=order/orders">View Orders</a>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id',
            'price',
            'description',
            'available',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
