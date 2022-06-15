<?php

namespace app\repositories;

use app\models\TaskModel;

interface ITaskRepository{
    public function save(TaskModel $model);
}