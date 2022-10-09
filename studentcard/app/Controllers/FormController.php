<?php namespace App\Controllers;

use App\Entities\RequestEntity;
use App\Models\RequestModel;
use Exception;

class FormController extends BaseController
{
    public function index()
    {

        helper(['form']);
        return $this->render('public/FormView');
    }


    /**
     * @throws Exception
     */
    public function createRequest()
    {
        $student_image = $this->request->getFile('student_image');
        $student_image_path= $student_image->getPath();

        $student_firstname = trim($this->request->getPost('student_firstname'));
        $student_lastname = trim($this->request->getPost('student_lastname'));

        $student_birthdate = trim($this->request->getPost('student_birthdate'));
        $student_residence = trim($this->request->getPost('student_residence'));

        $parent_name = trim($this->request->getPost('parent_name'));
        $parent_email = trim($this->request->getPost('parent_email'));

        $request = new RequestEntity();
        $requestModel = new RequestModel();
        $request->student_firstname = $student_firstname;
        $request->student_lastname = $student_lastname;
        $request->student_birthdate = $student_birthdate;
        $request->student_residence = $student_residence;
        $request->student_image = $this->encodeBase64($this->cropImage($student_image_path));
        $request->parent_name = $parent_name;
        $request->parent_email=$parent_email;

        $requestModel->save($request);

        return $this->render('public/SuccessView');





    }


    function cropImage($input_file): \CodeIgniter\Images\Handlers\BaseHandler
    {
        return \Config\Services::image()
            ->withFile($input_file)
            ->fit(185.0543, 229.1147, 'center');
    }

    function encodeBase64($input_file): string
    {

        return base64_encode($input_file);
    }


}
