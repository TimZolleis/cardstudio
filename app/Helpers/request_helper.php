<?php

namespace App\Helpers;


use App\Entities\ParentEntity;
use App\Entities\StudentEntity;
use App\Enum\RequestStatus;
use App\Models\RequestModel;
use CodeIgniter\HTTP\IncomingRequest;
use Ramsey\Uuid\Uuid;

/**
 * @throws \Exception
 */
function processRequest(IncomingRequest $request): RequestModel
{
    $studentEntity = new StudentEntity($request->getPost('student_firstname'), $request->getPost('student_lastname'), $request->getPost('student_birthdate'), $request->getPost('student_residence'));
    $parentEntity = new ParentEntity($request->getPost('parent_name'), $request->getPost('parent_email'));
    $imageEntity = createImageEntity($request->getFile('student_image'));
    return new RequestModel(createToken(), RequestStatus::OPEN, getCreatedAt(), $studentEntity, $parentEntity, $imageEntity, null);
}


function getCreatedAt(): string
{
    return date('d.m.Y');
}


/**
 * @throws \Exception
 */