<?php

use yii\db\Schema;
use yii\db\Migration;

class m150522_144608_create_posts_table extends Migration
{
    public function up()
    {
        $this->createTable('order_desc', array(
            'id' =>'pk',
            'order_id' => 'int(11) NOT NULL',
            'price' => 'decimal(10,2) NOT NULL',
            'description'=>'varchar(255) NOT NULL',
            'available'=>'tinyint(1) NOT NULL'
        ));
    }

    public function down()
    {
        $this->dropTable('order_desc');
        return false;
    }

}
