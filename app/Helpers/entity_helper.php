<?php


namespace App\Helpers;
function createRequestEntity($post_request)
{
    $request_entity = new \App\Entities\RequestEntity();

    $student_firstname = trim($post_request->getPost('student_firstname'));
    $student_lastname = trim($post_request->getPost('student_lastname'));
    $student_residence = trim($post_request->getPost('student_residence'));
    $student_birthdate = convertDate(trim($post_request->getPost('student_birthdate')));

//    Regarding parent
    $parent_name = trim($post_request->getPost('parent_name'));
    $parent_email = trim($post_request->getPost('parent_email'));

//    Fill in entity
    $request_entity->student_firstname = $student_firstname;
    $request_entity->student_lastname = $student_lastname;
    $request_entity->student_birthdate = $student_birthdate;
    $request_entity->student_residence = $student_residence;

    $request_entity->parent_name = $parent_name;
    $request_entity->parent_email = $parent_email;


    return $request_entity;

}


function convertDate($input_date)
{
    return date('d.m.Y', strtotime($input_date));
}