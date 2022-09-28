<?php namespace App\Controllers;

class Form extends BaseController
{
    public function index()
    {
        return $this->render('public/ExternalView');
    }
}
