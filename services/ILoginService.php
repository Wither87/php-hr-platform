<?php

namespace app\services;

use app\models\LoginForm;

interface ILoginService{
    public function login(LoginForm $form);

    public function logout();
}