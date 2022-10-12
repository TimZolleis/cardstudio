<?php

namespace App\Helpers;


use App\Entities\DBEntity;
use App\Models\RequestModel;

function updateRequest(RequestModel $requestModel): void
{


}


function createRequestModel($input_array)
{

}


function insertModel($db, RequestModel $requestModel)
{
    $builder = $db->table('cardstudio_requests');
    $dbEntity = new DBEntity($requestModel->created_at, $requestModel->request_status, $requestModel->studentEntity->student_firstname, $requestModel->studentEntity->student_lastname, $requestModel->studentEntity->student_birthdate, $requestModel->studentEntity->student_residence, $requestModel->parentEntity->parent_name, $requestModel->parentEntity->parent_email, $requestModel->imageEntity->student_image, $requestModel->imageEntity->student_image_type);
    return $builder->insert($dbEntity);

}


function newDB(): \CodeIgniter\Database\BaseConnection
{
    return \Config\Database::connect();
}