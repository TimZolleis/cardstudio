<?php

namespace App\Models;

use App\Entities\ImageEntity;
use App\Entities\ParentEntity;
use App\Entities\RequestEntity;
use App\Entities\StudentEntity;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class RequestModel
{
    public ?int $request_id;
    public string $request_status;
    public string $created_at;

    public StudentEntity $studentEntity;
    public ParentEntity $parentEntity;
    public ImageEntity $imageEntity;

    /**
     * @param int|null $request_id
     * @param string $request_status
     * @param string $created_at
     * @param StudentEntity $studentEntity
     * @param ParentEntity $parentEntity
     * @param ImageEntity $imageEntity
     */
    public function __construct(string $request_status, string $created_at, StudentEntity $studentEntity, ParentEntity $parentEntity, ImageEntity $imageEntity, ?int $request_id)
    {
        $this->request_id = $request_id;
        $this->request_status = $request_status;
        $this->created_at = $created_at;
        $this->studentEntity = $studentEntity;
        $this->parentEntity = $parentEntity;
        $this->imageEntity = $imageEntity;
    }


}
