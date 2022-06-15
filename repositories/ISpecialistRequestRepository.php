<?php

namespace app\repositories;

use app\models\SpecialistRequestModel;

interface ISpecialistRequestRepository{
    public function save(SpecialistRequestModel $model);
}