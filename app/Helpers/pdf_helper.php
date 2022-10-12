<?php


require('fpdm.php');
function fillPdf(\App\Models\RequestModel $requestModel): string
{
    $pdf = new FPDM(getenv('pdf.path'));
    $pdf->Load(getPdfFields($requestModel), false);
    $pdf->Merge();
    return $pdf->Output();


}


function getPdfFields(\App\Models\RequestModel $requestModel): array
{

    return array(
        'student_firstname' => $requestModel->studentEntity->student_firstname,
        'student_lastname' => $requestModel->studentEntity->student_lastname,
        'student_birthdate' => $requestModel->studentEntity->student_residence,
        'student_residence' => $requestModel->studentEntity->student_residence,

        'valid_until' => '30.09.2023',
        'student_image' => $requestModel->imageEntity->student_image
    );


}