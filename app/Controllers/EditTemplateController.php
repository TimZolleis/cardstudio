<?php


namespace App\Controllers;

class EditTemplateController extends BaseController
{
    public function index(): string
    {

        helper(['form', 'entity']);
        return $this->render('public/SuccessView');
    }



}
