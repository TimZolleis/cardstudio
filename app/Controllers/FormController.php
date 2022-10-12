<?php namespace App\Controllers;

use App\Entities\RequestEntity;
use App\Models\RequestModel;
use CodeIgniter\Database\Config;
use Config\Services;
use Exception;
use function App\Helpers\createRequestEntity;

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

        helper(['entity']);

        $request_entity = createRequestEntity($this->request);

        print_r($request_entity->parentEntity);


        $request_model = new RequestModel();
        $request_model->insert_data($request_entity);

//        $request_model->insert_data($request_entity);
//        $id = $request_model->getInsertID();

//        echo $this->getData($id);


    }


    function getData($id): array|object
    {
        $model = new RequestModel();
        return $model->find($id);
    }


    function cropImage($path)
    {
        $image = Services::image();

        $processed = $image->withFile($path)
            ->fit(699, 865, 'center')
            ->save('./uploads/images/temp/test_portrait_done.png');

        $data = file_get_contents('./uploads/images/temp/test_portrait_done.png');

        unlink('./uploads/images/temp/test_portrait_done.png');
        return 'data:image/png' . ';base64,' . base64_encode($data);


    }

    function encodeBase64($input_file): string
    {

        return base64_encode($input_file);
    }


}
