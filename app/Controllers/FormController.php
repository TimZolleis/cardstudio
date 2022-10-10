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
        $request_model = new RequestModel();

        $student_image = $this->request->getFile('student_image');
        $file_path = $student_image->getTempName();
        $student_image = $this->cropImage($file_path);


        $request_entity->student_image = $student_image;
        $id = $request_model->insert_data($request_entity);

        $test = $request_model->find($id);
        print_r($test);
        $data['firstname'] = $test->student_firstname;

        return $this->render('public/SuccessView', $data);


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
