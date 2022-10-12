<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use Config\Email;

class StudentEntity
{
    public string $student_firstname;
    public string $student_lastname;
    public string $student_birthdate;
    public string $student_residence;

    /**
     * @param string $student_firstname
     * @param string $student_lastname
     * @param string $student_birthdate
     * @param string $student_residence
     */
    public function __construct(string $student_firstname, string $student_lastname, string $student_birthdate, string $student_residence)
    {
        $this->student_firstname = $student_firstname;
        $this->student_lastname = $student_lastname;
        $this->student_birthdate = $student_birthdate;
        $this->student_residence = $student_residence;
    }


}