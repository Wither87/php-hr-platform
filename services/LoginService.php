<?php

namespace app\services;

use app\exceptions\UserNotFoundException;
use app\repositories\LoginRepository;
use app\models\LoginForm;
use Yii;

class LoginService implements ILoginService{
    public function login(LoginForm $form){
        $repository = new LoginRepository();
        $user = $repository->getUserByLogin($form->login);

        if ($user == null){
            throw new UserNotFoundException("пользователь не найден.");
        }

        if ($user->validatePassword($form->password)){
            return Yii::$app->user->login($user);
        }
        return false;
    }

    public function logout(){
        return Yii::$app->user->logout();
    }
}
