<?php

namespace App\Helpers;


use App\Entities\ImageEntity;
use App\Entities\StudentEntity;

function createNewStudentCard(StudentEntity $studentEntity, ImageEntity $imageEntity, string $validUntilDate, string $templateId)
{
    $template = getTemplate($templateId);
    $fontPath = $template->template_font_path;
    $fields = getTemplateFields($templateId);
    $template = createTemplateImage(getenv('template.image.path'));
    $student_image = createStudentImage($imageEntity->student_image);

//    Adding personalized Fields
    foreach ($studentEntity as $key => $value) {
        $template = addTextToImage($template, $fields[$key], $fontPath, $value);
    }

//    Adding Image
    $template = addImageToImage($template, $fields['student_image'], $student_image);

}




