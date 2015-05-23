<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDesc */


?>
<div class="order-desc-view">
   <?php if(!empty($data)):?>
        <h1>Order # <?php echo $data[0]['order_id']?>  <a href="/web/index.php?r=order/edit&id=<?php echo $data[0]['order_id']?>" class="btn btn-primary">Edit</a></h1>

    <table class="table">
        <tr>
            <th>Num</th>
            <th>Price</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
      <?php  foreach($data as $key => $order):?>
        <tr>
            <td><?php echo $key+1;?></td>
            <td><?php echo $order['price']?></td>
            <td><?php echo $order['description']?></td>
            <td><?php if(!$order['available']) echo 'not ';?>available</td>
        </tr>
      <?php endforeach;?>
    </table>
   <?php endif;?>
</div>
