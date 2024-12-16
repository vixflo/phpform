<?php

namespace formgenerator\components;

use formgenerator\components\Attribute;
use formgenerator\components\Plugin;
use formgenerator\components\SelectOption;

class Select
{
    public string $componentType;
    public string $helper;
    /** @var Plugin[] */
    /** @var array<Plugin> $plugins */
    public array $plugins;
    /** @var SelectOption[] */
    public array $selectOptions;
    /** @var Attribute[] */
    public array $attr;
    public string $clazz;
    public int $index;
    public string $label;
    public string $name;
    public string $placeholder;
    public string $value;
    public string $width;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->helper = $data->helper;
        $this->plugins = array_map(function ($pluginData) {

            return new Plugin($pluginData);

        }, $data->plugins);
        $this->selectOptions = array_map(function ($optionData) {
            return new SelectOption($optionData);
        }, $data->selectOptions);
        $this->attr = array_map(function ($attrData) {
            return new Attribute($attrData);
        }, $data->attr);
        $this->clazz = $data->clazz;
        $this->index = $data->index;
        $this->label = $data->label;
        $this->name = $data->name;
        $this->placeholder = $data->placeholder;
        $this->value = $data->value;
        $this->width = $data->width;
    }
}
