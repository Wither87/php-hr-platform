<?php

namespace app\services;

use app\models\TaskForm;
use app\models\TaskModel;
use app\repositories\TaskRepository;

class TaskService implements ITaskService{
    public function send(TaskForm $form){
        $model = new TaskModel();
        // mapping

        $repository = new TaskRepository();
        return $repository->save($model);
    }

    public function getTasks(){
        $repository = new TaskRepository();
        return $repository->getList();
    }

    public function getTaskById($id){
        $repository = new TaskRepository();
        return $repository->getById($id);
    }

    public function save($model){
        $repository = new TaskRepository();
        return $repository->save($model);
    }
}