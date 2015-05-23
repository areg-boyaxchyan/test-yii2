<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderDescSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-desc-index">

<?php if(!empty($data)):?>
    <table class="table">
        <tr>
            <th>OrderID</th>
            <th>View</th>
            <th>Edit</th>
        </tr>
      <?php foreach($data as $order):?>
        <tr>
            <td><?php echo $order['order_id'];?></td>
            <td><a href="/web/index.php?r=order/view&id=<?php echo $order['order_id'];?>" class="btn btn-success">View</a></td>
            <td><a href="/web/index.php?r=order/edit&id=<?php echo $order['order_id'];?>" class="btn btn-primary">Edit</a></td>
        </tr>
      <?php endforeach;?>
    </table>
<?php endif;?>
</div>
