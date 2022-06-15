<?php

namespace app\services;

use app\models\SigninForm;
use app\models\User;
use app\repositories\SigninRepository;
use app\exceptions\PasswordsNotEqualException;

class SigninService implements ISigninService{
    public function signin(SigninForm $form){
        $model = new User();
        if ($form->password != $form->password){
            throw new PasswordsNotEqualException();
        }
        $model->login = $form->login;
        $model->password = $model->encryptPassword($form->password);
        
        $repository = new SigninRepository();
        return $repository->save($model);
    }
}