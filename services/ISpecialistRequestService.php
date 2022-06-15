<?php

namespace app\services;

use app\models\SpecialistRequestForm;

interface ISpecialistRequestService{
    public function send(SpecialistRequestForm $form);
}