<?php

namespace App\Entities;
class TemplateEntity
{

    public string $template_id;
    public string $template_name;
    public bool $template_active;
    public string $template_font_path;
    public string $template_image_path;
    public bool $show_template_image;

    /**
     * @param string $template_id
     * @param string $template_name
     * @param bool $template_active
     * @param string $template_font_path
     * @param string $template_image_path ;
     * @param bool $show_template_image
     */
    public function __construct(string $template_id, string $template_name, bool $template_active, string $template_font_path, string $template_image_path, bool $show_template_image)
    {
        $this->template_id = $template_id;
        $this->template_name = $template_name;
        $this->template_active = $template_active;
        $this->template_font_path = $template_font_path;
        $this->template_image_path = $template_image_path;
        $this->show_template_image = $show_template_image;
    }


}