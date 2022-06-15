<?php

namespace app\controllers;

use app\models\TaskForm;
use app\models\TaskModel;
use app\services\TaskService;
use yii\web\Controller;
use app\exceptions\EstimateTaskException;
use app\exceptions\InvalidFileFormatException;
use app\exceptions\TaskNotFoundException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class TaskController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['view', 'tasks', 'estimate-task', 'send-response'],
                        'allow' => false,
                        'roles' => ['?'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView(){
        $service = new TaskService();
        $form = new TaskForm();

        if ($this->request->isPost 
            && $form->load($this->request->post())){
            $service->send($form);
        }

        return $this->render('view');
    }

    public function actionTasks(){
        $service = new TaskService();
        $tasks = $service->getTasks();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $tasks;
    }

    public function actionEstimateTask($id, $status){
        if ($status < TaskModel::$NOT_PASSED || $status > TaskModel::$SENT_TO_REVISION){
            throw new EstimateTaskException("Оценка задачи не правильная.");
        }

        $service = new TaskService();
        $task = $service->getTaskById($id);
        if ($task == null){
            throw new TaskNotFoundException("Задача с id=$id не существует.");
        }

        $task->status = $status;
        $service->save($task);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $task;
    }

    protected function validateFileType($filename){
        $filenameParts = explode('.', $filename);
        $ext = end($filenameParts);
        return $ext == "doc" || $ext == "docx";
    }

    public function actionSendResponse($id, $filename){
        
        if ($this->validateFileType($filename)){
            $service = new TaskService();
            $task = $service->getTaskById($id);

            if ($task == null){
                throw new TaskNotFoundException("Задача с id=$id не существует.");
            }

            $task->setResponse($filename);
            $service->save($task);
    
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $task;
        }
        else{
            throw new InvalidFileFormatException("Формат файла не правильный. Нужен doc или docx.");
        }
    }
}