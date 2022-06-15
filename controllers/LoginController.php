<?php

namespace app\controllers;

use Yii;
use app\services\LoginService;
use app\models\LoginForm;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class LoginController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'login','login-url', 'logout'],
                        'allow' => true,
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
        return $this->redirect(["/login/login"]);
    }

    public function actionLogin(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $loginService = new LoginService();
        $form = new LoginForm();
        if ($loginService->login($form)) {
            return $this->goBack();
        }
        return $this->render('login', compact("model"));
    }

    public function actionLoginUrl($login, $password){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $loginService = new LoginService();
        $form = new LoginForm();
        $form->login = $login;
        $form->password = $password;
        
        if ($loginService->login($form)) {
            return $this->goBack();
        }
        return $this->render('login', compact("model"));
    }


    public function actionLogout()
    {
        $loginService = new LoginService();
        $loginService->logout();

        return $this->goHome();
    }
}