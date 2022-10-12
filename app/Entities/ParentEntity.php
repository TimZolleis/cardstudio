<?php

namespace App\Entities;



class ParentEntity
{
    public string $parent_name;
    public string $parent_email;

    /**
     * @param string $parent_name
     * @param string $parent_email
     */
    public function __construct(string $parent_name, string $parent_email)
    {
        $this->parent_name = $parent_name;
        $this->parent_email = $parent_email;
    }


}