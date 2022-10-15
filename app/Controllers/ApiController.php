<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use function App\Helpers\createModelFromDb;
use function App\Helpers\createPdfModel;
use function App\Helpers\createTemplate;
use function App\Helpers\getStudentData;
use function App\Helpers\newDB;


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
        helper(['db']);
        $data = json_decode($this->request->getBody());
        createTemplate(newDB(), $data);
        return $this->respond($data->student_image->x);

    }


}
