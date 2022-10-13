<?php

namespace App\API\Models;

use App\Models\RequestModel;

class PdfModel
{


    public RequestModel $request;
    public string $valid_until;
    public string $pdf_file;

    /**
     * @param RequestModel $request
     * @param string $valid_until
     * @param string $pdf_file
     */
    public function __construct(RequestModel $request, string $valid_until, string $pdf_file)
    {
        $this->request = $request;
        $this->valid_until = $valid_until;
        $this->pdf_file = $pdf_file;
    }


}