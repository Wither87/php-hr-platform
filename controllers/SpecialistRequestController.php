<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\SpecialistRequestForm;
use app\services\SpecialistRequestService;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class SpecialistRequestController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    public function actionIndex()
    {
        $service = new SpecialistRequestService();
        $form = new SpecialistRequestForm();

        if ($this->request->isPost 
            && $form->load($this->request->post())){
            $service->send($form);
        }

        return $this->render('index');
    }
}