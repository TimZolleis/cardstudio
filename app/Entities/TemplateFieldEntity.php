<?php


class TemplateFieldEntity
{

    public string $field_name;
    public string $field_x;
    public string $field_y;

    public string $field_width;
    public string $field_height;

    public string $template_id;

    /**
     * @param string $field_name
     * @param string $field_x
     * @param string $field_y
     * @param string $field_width
     * @param string $field_height
     * @param string $template_id
     */
    public function __construct(string $field_name, string $field_x, string $field_y, string $field_width, string $field_height, string $template_id)
    {
        $this->field_name = $field_name;
        $this->field_x = $field_x;
        $this->field_y = $field_y;
        $this->field_width = $field_width;
        $this->field_height = $field_height;
        $this->template_id = $template_id;
    }


}