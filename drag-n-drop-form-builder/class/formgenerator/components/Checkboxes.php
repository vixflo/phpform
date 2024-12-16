<?php

namespace formgenerator\components;

use formgenerator\components\Attribute;
use formgenerator\components\Checkbox;

class Checkboxes
{
    public string $componentType;
    public string $helper;
    /** @var array<Plugin> $plugins */
    public array $plugins;
    /** @var Checkbox[] */
    public array $checkboxes;
    /** @var Attribute[] */
    public array $attr;
    public string $center;
    public string $clazz;
    public int $index;
    public string $inline;
    public string $label;
    public string $name;
    public string $value;
    public string $width;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->helper = $data->helper;
        $this->plugins = $data->plugins;
        $this->checkboxes = array_map(function ($checkboxData) {
            return new Checkbox($checkboxData);
        }, $data->checkboxes);
        $this->attr = array_map(function ($attrData) {
            return new Attribute($attrData);
        }, $data->attr);
        $this->center = $data->center;
        $this->clazz = $data->clazz;
        $this->index = $data->index;
        $this->inline = $data->inline;
        $this->label = $data->label;
        $this->name = $data->name;
        $this->value = $data->value;
        $this->width = $data->width;
    }
}
