<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use function App\Helpers\createModelFromDb;
use function App\Helpers\createPdfModel;
use function App\Helpers\getStudentData;


class ApiController extends ResourceController
{

    use ResponseTrait;

    public function getRequestData(): \CodeIgniter\HTTP\Response
    {
        $request_token = $this->request->getVar('token');
        helper(['db', 'image', 'pdf']);
        $data = getStudentData(db_connect(), $request_token);
        return $this->respond(createPdfModel(createModelFromDb($data), "30.12.2022"));
    }


    public function setImageTemplateData()
    {
        $data = json_decode($this->request->getBody());







        return $this->respond($data);

    }


}
