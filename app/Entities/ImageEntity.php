<?php

namespace App\Entities;


use CodeIgniter\HTTP\Files\UploadedFile;

class ImageEntity
{
    protected UploadedFile $image_file;
    protected string $path;
    protected string $filename;

    public function __construct($image_file)
    {
        $this->image_file = $image_file;
        $this->path = getenv('image.path') . $image_file->getName();
        $this->filename = $image_file->getName();
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    public function move(): void
    {
        $this->image_file->move(getenv('image.path'));
    }


}