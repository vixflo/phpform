<?php

namespace formgenerator\components;

use formgenerator\components\Attribute;
use formgenerator\components\Plugin;

class Input
{
    public string $helper;
    public string $icon;
    public string $iconPosition;
    /** @var Plugin[] */
    /** @var array<Plugin> $plugins */
    public array $plugins;
    /** @var Attribute[] */
    public array $attr;
    public string $clazz;
    public int $index;
    public string $label;
    public string $name;
    public string $placeholder;
    public string $type;
    public string $value;
    public string $width;

    public function __construct(\stdClass $data)
    {
        $this->helper = $data->helper;
        $this->icon = $data->icon;
        $this->iconPosition = $data->iconPosition;
        $this->plugins = array_map(function ($pluginData) {
            return new Plugin($pluginData);
        }, $data->plugins);

        $this->attr = array_map(function ($attrData) {
            return new Attribute($attrData);
        }, $data->attr);
        $this->clazz = $data->clazz;
        $this->index = $data->index;
        $this->label = $data->label;
        $this->name = $data->name;
        $this->placeholder = $data->placeholder;
        $this->type = $data->type;
        $this->value = $data->value;
        $this->width = $data->width;
    }
}
