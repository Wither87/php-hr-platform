<?php

use yii\db\Migration;

/**
 * Class m220615_132926_create_user
 */
class m220615_132926_create_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("user",[
            'id'=>$this->primaryKey(),
            'login'=>$this->string(),
            'password'=>$this->string(),
            'name'=>$this->integer(),
            'course'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220615_132926_create_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_132926_create_user cannot be reverted.\n";

        return false;
    }
    */
}
