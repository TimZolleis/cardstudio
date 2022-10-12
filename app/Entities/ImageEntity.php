<?php

namespace App\Entities;


class ImageEntity
{

    public string $student_image;
    public string $student_image_type;
    public string $student_image_path;

    /**
     * @param string $student_image
     * @param string $student_image_type
     */
    public function __construct(string $student_image, string $student_image_type, string $student_image_path)
    {
        $this->student_image = $student_image;
        $this->student_image_type = $student_image_type;
        $this->student_image_path = $student_image_path;
    }


}