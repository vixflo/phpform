<?php

namespace formgenerator\components;

use formgenerator\components\Attribute;
use formgenerator\components\Button;

class Buttongroup
{
    public string $componentType;
    /** @var array<Plugin> $plugins */
    public array $plugins;
    /** @var Attribute[] */
    public array $attr;
    public string $center;
    public string $clazz;
    public int $index;
    public string $name;
    /** @var Button[] */
    public array $buttons;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->plugins = $data->plugins;
        $this->attr = array_map(function ($attrData) {
            return new Attribute($attrData);
        }, $data->attr);
        $this->center = $data->center;
        $this->clazz = $data->clazz;
        $this->index = $data->index;
        $this->name = $data->name;
        $this->buttons = array_map(function ($buttonData) {
            return new Button($buttonData);
        }, $data->buttons);
    }
}
