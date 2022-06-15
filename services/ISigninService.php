<?php

namespace app\services;

use app\models\SigninForm;

interface ISigninService{
    public function signin(SigninForm $form);
}