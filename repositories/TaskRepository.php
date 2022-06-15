<?php

namespace app\repositories;

use app\models\TaskModel;
use Exception;

class TaskRepository implements ITaskRepository{
    public function save(TaskModel $model){
        try{
            $model->save();
            return true;
        }
        catch (Exception $e){
            return false;
        }
    }

    public function getList(){
        return TaskModel::find()->all();
    }

    public function getById($id){
        return TaskModel::findOne($id);
    }
}