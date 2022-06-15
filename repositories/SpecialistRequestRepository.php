<?php

namespace app\repositories;

use app\models\SpecialistRequestModel;
use Exception;

class SpecialistRequestRepository{
    public function save(SpecialistRequestModel $model){
        try{
            $model->save();
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}