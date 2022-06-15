<?php

namespace app\models;

use yii\db\ActiveRecord;

class TaskModel extends ActiveRecord{

    public static $NOT_PASSED = 0;
    public static $ACCEPTED = 1;
    public static $SENT_TO_REVISION = 2;
    public static $DELETED = 3;
    
    
    public static function tableName()
    {
        return "task";
    }

    public function setResponse($filename){
        $this->response = $filename;
    }
}