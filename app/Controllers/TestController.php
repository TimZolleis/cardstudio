<?php


namespace App\Controllers;

class TestController extends BaseController
{
    public function index(): string
    {

        helper(['form', 'entity']);
        return $this->render('public/TestImageView');
    }



}
