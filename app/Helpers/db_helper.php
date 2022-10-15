<?php

namespace App\Helpers;


use App\API\Models\PdfModel;
use App\Entities\DBEntity;
use App\Entities\ImageEntity;
use App\Entities\ParentEntity;
use App\Entities\StudentEntity;
use App\Entities\TemplateEntity;
use App\Entities\TemplateFieldEntity;
use App\Models\RequestModel;
use CodeIgniter\Database\BaseConnection;
use Ramsey\Uuid\Uuid;

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

function createToken(): string
{
    return Uuid::uuid1();

}

function getBuilder($db, $table = 'cardstudio_requests')
{
    return $db->table($table);
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


function createTemplate(BaseConnection $db, $data)
{
    $textFieldBuilder = $db->table('cardstudio_text_fields');
    $imageFieldBuilder = $db->table('cardstudio_image_fields');
    $template_builder = $db->table('cardstudio_templates');

    $templateEntity = new TemplateEntity(createToken(), "Schülerausweis 22/23", true, "/files/fonts/template_font.ttf", "./assets/pdf/template.png", true);

    $fieldArray = array();

    foreach ($data as $key => $value) {
        $fieldArray[] = new TemplateFieldEntity($key, $value->x, $value->y, $value->width, $value->height, $templateEntity->template_id);
    }

    $template_builder->insert($templateEntity);
    $textFieldBuilder->insertBatch($fieldArray);

}


function getTemplateFields($templateId): array
{
    $db = newDB();
    $fieldBuilder = $db->table(getenv('pdf.fields.table'));
    return $fieldBuilder->getWhere(['template_id' => $templateId])->getResultArray();
}

function getTemplate($templateId)
{

    $db = newDB();
    return $db->table(getenv('pdf.template.table'))->getWhere(['template_id' => $templateId])->getFirstRow();


}