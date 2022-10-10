<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use Exception;
use App\Enum\RequestStatus;


class RequestEntity extends Entity
{
    protected string $request_id;
    public string $created_at;
    public string $request_status;
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
        $this->created_at = $this->getCurrentDate();

        $this->request_status = RequestStatus::OPEN;


    }


    public function getCurrentDate(): string
    {
        return date('d.m.Y');
    }
}
