<?php namespace App\Controllers;

class FormController extends BaseController
{
    public function index()
    {

        helper(['form']);
        return $this->render('public/TestView');
    }


    public function createRequest(){
        $student_firstname = trim($this->request->getPost('student_firstname'));
        $student_lastname = trim($this->request->getPost('student_lastname'));

        $student_birthdate = trim($this->request->getPost('student_birthdate'));
        $student_residence = trim($this->request->getPost('student_residence'));

        $parent_name = trim($this->request->getPost('parent_name'));
        $parent_email = trim($this->request->getPost('parent_email'));





        //do something with i





    }
}
