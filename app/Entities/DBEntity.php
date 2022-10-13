<?php


namespace App\Entities;
class DBEntity
{
    public string $request_token;
    public string $created_at;
    public string $request_status;
    public string $student_firstname;
    public string $student_lastname;
    public string $student_birthdate;
    public string $student_residence;
    public string $parent_name;
    public string $parent_email;

    public string $student_image;
    public string $student_image_type;

    /**
     * @param string $request_token
     * @param string $created_at
     * @param string $request_status
     * @param string $student_firstname
     * @param string $student_lastname
     * @param string $student_birthdate
     * @param string $student_residence
     * @param string $parent_name
     * @param string $parent_email
     * @param string $student_image
     * @param string $student_image_type
     */
    public function __construct(string $request_token, string $created_at, string $request_status, string $student_firstname, string $student_lastname, string $student_birthdate, string $student_residence, string $parent_name, string $parent_email, string $student_image, string $student_image_type)
    {
        $this->request_token = $request_token;
        $this->created_at = $created_at;
        $this->request_status = $request_status;
        $this->student_firstname = $student_firstname;
        $this->student_lastname = $student_lastname;
        $this->student_birthdate = $student_birthdate;
        $this->student_residence = $student_residence;
        $this->parent_name = $parent_name;
        $this->parent_email = $parent_email;
        $this->student_image = $student_image;
        $this->student_image_type = $student_image_type;
    }


}