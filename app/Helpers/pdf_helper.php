<?php


function getPdfFile()
{

    $file = file_get_contents(getenv('pdf.path'));
    return base64_encode($file);


}
