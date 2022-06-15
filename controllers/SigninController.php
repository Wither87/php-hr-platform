<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\services\SigninService;
use app\models\SigninForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class SigninController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'signin', 'signin-url'],
                        'allow' => true,
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

    public function actionSignin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $service = new SigninService();
        $form = new SigninForm();
        if ($service->signin($form)) {
            return $this->goBack();
        }
        return $this->render('index');
    }

    public function actionSigninUrl($login, $password, $password2)
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $service = new SigninService();
        $form = new SigninForm();

        $form->login = $login;
        $form->password = $password;
        $form->passwordConfirm = $password2;

        if ($service->signin($form)) {
            return $this->goBack();
        }
        return $this->render('index');
    }
}