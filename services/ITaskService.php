<?php

namespace app\services;

use app\models\TaskForm;

interface ITaskService{
    public function send(TaskForm $form);
}