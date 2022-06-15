<?php

namespace app\models;

use yii\base\Model;

class SigninForm extends Model{
    public $login;
    public $password;
    public $passwordConfirm;
}