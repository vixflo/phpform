<?php

namespace formgenerator\components;

use formgenerator\components\Attribute;
use formgenerator\components\Plugin;

class Button
{
    public string $componentType;
    /** @var Plugin[] */
    /** @var array<Plugin> $plugins */
    public array $plugins;
    /** @var Attribute[] */
    public array $attr;
    public string $center;
    public string $clazz;
    public string $icon;
    public string $iconPosition;
    public int $index;
    public string $label;
    public string $name;
    public string $type;
    public string $value;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->plugins = array_map(function ($pluginData) {
            return new Plugin($pluginData);
        }, $data->plugins);
        $this->attr = array_map(function ($attrData) {
            return new Attribute($attrData);
        }, $data->attr);
        $this->center = $data->center;
        $this->clazz = $data->clazz;
        $this->icon = $data->icon;
        $this->iconPosition = $data->iconPosition;
        $this->index = $data->index;
        $this->label = $data->label;
        $this->name = $data->name;
        $this->type = $data->type;
        $this->value = $data->value;
    }
}
