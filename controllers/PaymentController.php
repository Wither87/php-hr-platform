<?php

namespace app\controllers;

use yii\web\Controller;

class PaymentController extends Controller{

    // some code

    public function actionIndex()
    {
        return $this->render('index');
    }
}