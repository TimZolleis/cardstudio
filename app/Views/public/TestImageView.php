<?php

$template_file = file_get_contents("./assets/pdf/template.png");
$template = new Imagick();
$template->readImageBlob($template_file);

$draw = new ImagickDraw();
$draw->setFillColor('black');
$draw->setFontSize(300);


$student_file = file_get_contents(realpath("./assets/pdf/done.png"));
$student_image = new Imagick();
$student_image->readImageBlob($student_file);


$student_image->resizeImage(2181, 2775, \Imagick::FILTER_LANCZOS, 1
);

$template->compositeImage($student_image, IMAGICK::COMPOSITE_OVER, 326, 1724);

$rect = [
    'x' => 2729,
    'y' => 2032,
    'w' => 2500,
    'h' => 470,
];


$roi = new ImagickDraw();
$roi->setStrokeColor('RED');
$roi->setStrokeWidth(2);
$roi->setFillColor("TRANSPARENT");
$roi->rectangle($rect['x'],
    $rect['y'],
    $rect['x'] + $rect['w'],
    $rect['y'] + $rect['h']);
$template->drawImage($roi);

$template->annotateImage($draw, $rect['x'], $rect['y'] + $rect['h'] / 2, 0, "Max Mustermann");


header("Content-Type: image/png");

$template->scaleImage(0, 500);


echo '<img src="data:image/png;base64,' . base64_encode($template->getImageBlob()) . '" alt="" class="rounded-xl" />';
