<?php


namespace App\Helpers;

use App\Entities\ImageEntity;
use App\Entities\ParentEntity;
use App\Entities\RequestEntity;
use App\Entities\StudentEntity;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @throws \Exception
 */
function createRequestEntity(IncomingRequest $request): RequestEntity
{

    helper('image');
    $student_firstname = trim($request->getPost('student_firstname'));
    $student_lastname = trim($request->getPost('student_lastname'));
    $student_residence = trim($request->getPost('student_residence'));
    $student_birthdate = convertDate(trim($request->getPost('student_birthdate')));
    $student_image_path = $request->getFile('student_image')->getTempName();
    $student_image_type = $request->getFile('student_image')->getMimeType();

    $parent_name = trim($request->getPost('parent_name'));
    $parent_email = trim($request->getPost('parent_email'));



    $student_entity = new StudentEntity($student_firstname, $student_lastname, $student_birthdate, $student_residence);
    $parent_entity = new ParentEntity($parent_name, $parent_email);
    $image_entity = new ImageEntity(createImage($student_image_path, $student_image_type), $student_image_type, $student_image_path);

    return new RequestEntity($student_entity, $parent_entity, $image_entity);

}


function convertDate($input_date)
{
    return date('d.m.Y', strtotime($input_date));
}