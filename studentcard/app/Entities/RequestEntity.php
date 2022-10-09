<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use Exception;
use RequestStatus;


class RequestEntity extends Entity
{
    protected string $request_id;
    protected string $request_date;
    protected string $request_status;
    public string $student_firstname;
    public string $student_lastname;
    public string $student_birthdate;
    public string $student_residence;
    public string $student_image;
    public string $parent_name;
    public string $parent_email;


    /**
     * @throws Exception
     */
    public function __construct(?array $data = null)
    {
        parent::__construct($data);

        $this->request_id=random_bytes(32);
        $this->request_date=$this->getCurrentDate();
        if(!isset($this->request_status)){
            $this->request_status='OPEN';
        }
    }


    public function getCurrentDate(): string
    {
        return date('d.m.>');
    }
}
