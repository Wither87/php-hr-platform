<?php

namespace app\repositories;

interface ILoginRepository{
    public function getUserByLogin(string $login);
}