<?php

namespace app\services;

use app\models\SpecialistRequestForm;
use app\models\SpecialistRequestModel;
use app\repositories\SpecialistRequestRepository;

class SpecialistRequestService implements ISpecialistRequestService{
    public function send(SpecialistRequestForm $form){
        $model = new SpecialistRequestModel();
        // маппинг
        $model->companyTitle = $form->companyTitle;
        $model->address = $form->address;
        $model->yourFullname = $form->yourFullname;
        $model->requirement = $form->requirement;
        $model->period = $form->period;

        $repository = new SpecialistRequestRepository();
        return $repository->save($model);
    }
}