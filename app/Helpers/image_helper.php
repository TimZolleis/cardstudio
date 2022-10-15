<?php


use Config\Services;

function cropImage(\CodeIgniter\HTTP\Files\UploadedFile $image, $type): string
{
    $imageService = Services::image();
    $path = $image->getTempName();
    $extension = getExtension($type);
    try {
        $imageService->withFile($path)
            ->fit(699, 865, 'center')
            ->save(getPath($extension));

    } catch (\CodeIgniter\Images\Exceptions\ImageException) {

    }

    return file_get_contents(getPath($extension));

}


function getPath($extension): string
{
    return getenv('image.path.ready') . $extension;
}


function getExtension($type): string
{
    return substr($type, -3);
}

function getImageType(\CodeIgniter\HTTP\Files\UploadedFile $image): string
{
    return $image->getMimeType();
}


function createImageEntity($image): \App\Entities\ImageEntity
{
    $croppedImage = cropImage($image, getImageType($image));
    $imageType = getImageType($image);

    return new \App\Entities\ImageEntity($croppedImage, $imageType);


}

function encodeImageBase64($blob, $imageType): string
{
    return "data:$imageType;base64, " . base64_encode($blob);
}

function getFieldY(int $fieldY, int $fieldHeight): int
{
    return ($fieldY + $fieldHeight) / 2;
}


function createTemplateImage(string $templateImagePath): Imagick
{
    $templateImage = new Imagick();
    $templateImage->readImageBlob(file_get_contents($templateImagePath));

    return $templateImage;
}


function createStudentImage(string $studentImageBlob): Imagick
{
    $studentImage = new Imagick();
    $studentImage->readImageBlob($studentImageBlob);

    return $studentImage;

}


function addTextToImage(Imagick $templateImage, \App\Entities\TemplateFieldEntity $fieldEntity, string $fontPath, string $textToAdd,): Imagick
{
    $fontSettings = new ImagickDraw();
    $fontSettings->setFillColor('black');
    $fontSettings->setFontSize(getenv('template.font.size'));
    $fontSettings->setFont($fontPath);
    $templateImage->annotateImage($fontSettings, $fieldEntity->field_x, getFieldY($fieldEntity->field_y, $fieldEntity->field_height), 0, $textToAdd);
    return $templateImage;
}

function addImageToImage(Imagick $templateImage, \App\Entities\TemplateFieldEntity $templateFieldEntity, Imagick $imageToAdd): Imagick
{
    $imageToAdd->scaleImage($templateFieldEntity->field_width, 0);
    $templateImage->compositeImage($imageToAdd, IMAGICK::COMPOSITE_OVER, $templateFieldEntity->field_x, $templateFieldEntity->field_y);
    return $templateImage;
}







