<?php namespace App\Controllers;

use App\Entities\RequestEntity;
use App\Models\RequestModel;
use CodeIgniter\Database\Config;
use Config\Services;
use Exception;
use function App\Helpers\createRequestEntity;
use function App\Helpers\insertModel;
use function App\Helpers\newDB;
use function App\Helpers\processRequest;

class FormController extends BaseController
{
    public function index()
    {

        helper(['form', 'entity']);
        return $this->render('public/FormView');
    }


    /**
     * @throws Exception
     */
    public function createRequest()
    {
        helper(['db', 'request', 'image']);
        $requestModel = processRequest($this->request);
        $request_token = (insertModel(newDB(), $requestModel));
        setcookie("token", $request_token);
        return $this->render('public/SuccessView');

    }


}
