<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderDesc */

$this->title = 'Edit Order';
$this->params['breadcrumbs'][] = ['label' => 'Order Descs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-desc-edit">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_eform', [
        'model' => $model,
        'data' => $data
    ]) ?>

</div>
