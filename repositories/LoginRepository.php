<?php

namespace app\repositories;

use Exception;
use app\models\User;

class LoginRepository implements ILoginRepository{
    public function getUserByLogin(string $login)
    {
        return User::findOne(["login"=>$login]);
    }
}