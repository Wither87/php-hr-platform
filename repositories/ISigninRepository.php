<?php

namespace app\repositories;

use app\models\User;

interface ISigninRepository{
    public function save(User $model);
}