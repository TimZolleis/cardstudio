<?php

namespace App\Models;

use App\Entities\RequestEntity;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class RequestModel extends Model
{
    protected $table = 'cardstudio_requests';
    protected $DBGroup = 'default';
    protected $primaryKey = 'request_id';
    protected $allowedFields = ['created_at', 'request_status', 'student_firstname', 'student_lastname', 'student_birthdate', 'student_residence', 'student_image', 'parent_name', 'parent_email'];
    protected $returnType = \App\Entities\RequestEntity::class;


    protected $db;

    public function __construct(?ConnectionInterface $db = null, ?ValidationInterface $validation = null)
    {
        parent::__construct();
        $this->db = \Config\Database::connect('default');
    }


    public function insert_data(RequestEntity $requestEntity): int|string


    {


        $data = [
            'student_firstname' => $requestEntity->studentEntity->student_firstname,
            'student_lastname' => $requestEntity->studentEntity->student_lastname,
            'student_residence' => $requestEntity->studentEntity->student_residence,
            'student_birthdate' => $requestEntity->studentEntity->student_birthdate,
            'student_image' => $requestEntity->imageEntity->student_image,
            'student_image_type' => $requestEntity->imageEntity->student_image_type,
            'parent_name' => $requestEntity->parentEntity->parent_name,
            'parent_email' => $requestEntity->parentEntity->parent_email,
            'created_at' => $requestEntity->created_at,
            'request_status' => $requestEntity->request_status
        ];

        return $this->db->table('cardstudio_requests')->insert($data);


    }

    public function last_request_id(): int|string
    {
        return $this->db->insertID();
    }

}
