<?php

namespace app\repositories;

use app\models\User;
use Exception;

class SigninRepository implements ISigninRepository{
    public function save(User $model){
        try{
            $model->save();
            return true;
        }
        catch (Exception $e){
            return false;
        }
    }
}