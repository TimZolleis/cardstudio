<?php
namespace App\Models;


use App\Model\InformationModel;

class RequestModel {

    public int $id;
    public string $applicantName;
    public InformationModel $studentInformation;

    function __construct($id, $applicantName, $studentInformation)
    {
        $this->id = $id;
        $this->applicantName= $applicantName;
        $this->studentInformation = $studentInformation;
    }


}
