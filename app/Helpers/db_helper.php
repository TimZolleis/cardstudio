<?php

namespace App\Helpers;


use App\API\Models\PdfModel;
use App\Entities\DBEntity;
use App\Entities\ImageEntity;
use App\Entities\ParentEntity;
use App\Entities\StudentEntity;
use App\Models\RequestModel;
use CodeIgniter\Database\BaseConnection;

function updateRequest(RequestModel $requestModel): void
{


}


function createModelFromDb($data): RequestModel
{
    $studentEntity = new StudentEntity($data->student_firstname, $data->student_lastname, $data->student_birthdate, $data->student_residence);
    $parentEntity = new ParentEntity($data->parent_name, $data->parent_email);
    $imageEntity = new ImageEntity(encodeImageBase64($data->student_image, $data->student_image_type), $data->student_image_type);

    return new RequestModel($data->request_token, $data->request_status, $data->created_at, $studentEntity, $parentEntity, $imageEntity, $data->request_id);


}

function getBuilder($db)
{
    return $db->table('cardstudio_requests');
}

function insertModel($db, RequestModel $requestModel): string
{
    $builder = $db->table('cardstudio_requests');
    $dbEntity = new DBEntity($requestModel->request_token, $requestModel->created_at, $requestModel->request_status, $requestModel->studentEntity->student_firstname, $requestModel->studentEntity->student_lastname, $requestModel->studentEntity->student_birthdate, $requestModel->studentEntity->student_residence, $requestModel->parentEntity->parent_name, $requestModel->parentEntity->parent_email, $requestModel->imageEntity->student_image, $requestModel->imageEntity->student_image_type);
    $builder->insert($dbEntity);
    return $requestModel->request_token;

}


function newDB(): \CodeIgniter\Database\BaseConnection
{
    return \Config\Database::connect();
}

function getStudentData(BaseConnection $db, string $request_token)
{
    $builder = $db->table('cardstudio_requests');
    return $builder->getWhere(['request_token' => $request_token])->getFirstRow();
}


function createPdfModel(RequestModel $requestModel, $validUntil): PdfModel
{

    return new PdfModel($requestModel, $validUntil, getPdfFile());
}