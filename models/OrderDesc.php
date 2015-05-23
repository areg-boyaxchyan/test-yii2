<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_desc".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $price
 * @property string $description
 * @property integer $available
 */
class OrderDesc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_desc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'price', 'description', 'available'], 'required'],
            [['order_id', 'available'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'order_id' => 'Order ID',
            'price' => 'Price',
            'description' => 'Description',
            'available' => 'Available',
        ];
    }
}
