<?php

namespace formgenerator\components;

use formgenerator\components\Attribute;
use formgenerator\components\Plugin;
use formgenerator\components\RadioButton;

class Radio
{
    public string $componentType;
    public string $helper;
    /** @var Plugin[] */
    /** @var array<Plugin> $plugins */
    public array $plugins;
    /** @var RadioButton[] */
    public array $radioButtons;
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
        $this->plugins = array_map(function ($pluginData) {
            return new Plugin($pluginData);
        }, $data->plugins);
        $this->radioButtons = array_map(function ($buttonData) {
            return new RadioButton($buttonData);
        }, $data->radioButtons);
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
