<?php

use yii\db\Migration;

/**
 * Class m220615_114254_create_tasks_2
 */
class m220615_114254_create_tasks_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("task",[
            'id'=>$this->primaryKey(),
            'student_id'=>$this->integer(),
            'mentor_id'=>$this->integer(),
            'title'=>$this->string(),
            'description'=>$this->string(),
            'status'=>$this->integer(),
            'response'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220615_114254_create_tasks_2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_114254_create_tasks_2 cannot be reverted.\n";

        return false;
    }
    */
}
