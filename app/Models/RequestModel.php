<?php

namespace App\Models;

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


    public function insert_data($data)
    {
        $this->db->table('cardstudio_requests')->insert($data);
        return $this->db->insertID();

    }

}
