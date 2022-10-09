<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{

    protected $table = 'cardstudio_requests';
    protected $allowedFields = ['student_firstname', 'student_lastname', 'student_birthdate', 'student_residence', 'student_image', 'parent_name', 'parent_email'];
    protected $returnType = \App\Entities\RequestEntity::class;
    protected $useTimestamps = true;

}
