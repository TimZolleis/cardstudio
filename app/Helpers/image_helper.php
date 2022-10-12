<?php


use Config\Services;

function createImage($path, $type): string
{
    $image = Services::image();
    $extension = getExtension($type);
    try {
        $image->withFile($path)
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

