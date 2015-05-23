<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDesc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-desc-form">

    <?php  $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
    <?php if(isset($_POST['OrderDesc'])):?>
        <?php for ($i = 0; $i < count($_POST['OrderDesc']['price']); $i++):?>
            <p class="form_row" <?php if($i==count($_POST['OrderDesc']['price'])-1) echo'id="form_first"';?>>
                <input type="number" name="OrderDesc[price][]"
                    value="<?php if(isset($_POST['OrderDesc']['price'][$i])) echo $_POST['OrderDesc']['price'][$i]; ?>" style="width: 50px" required="true">
                <input type="text" name="OrderDesc[description][]"  value="<?php if(isset($_POST['OrderDesc']['description'][$i])) echo $_POST['OrderDesc']['description'][$i]; ?>" required="true" maxlength="255" />
                <input type="checkbox"  name="OrderDesc[available][]" value="1" <?php if(isset($_POST['OrderDesc']['price'][$i])) echo 'checked'; ?>>
                <span class="glyphicon glyphicon-<?php if($i==count($_POST['OrderDesc']['price'])-1) echo'plus'; else echo 'minus';?>"></span>
            </p>
        <?php endfor;?>
     <?php else:?>
        <p class="form_row" id="form_first">
            <input type="number" name="OrderDesc[price][]" style="width: 50px" required="true">
            <input type="text" name="OrderDesc[description][]" required="true" maxlength="255" />
            <input type="checkbox" name="OrderDesc[available][]" value="1">
            <span class="glyphicon glyphicon-plus"></span>
        </p>
    <?php endif;?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>