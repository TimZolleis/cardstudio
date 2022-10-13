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