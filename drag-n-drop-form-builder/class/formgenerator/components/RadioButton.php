<?php

namespace formgenerator\components;

use formgenerator\components\Attribute;

class RadioButton
{
    public int $index;
    public string $text;
    public string $value;
    public bool $disabled;
    /** @var Attribute[] */
    public array $attr;

    public function __construct(\stdClass $data)
    {
        $this->index = $data->index;
        $this->text = $data->text;
        $this->value = $data->value;
        $this->disabled = $data->disabled;
        $this->attr = array_map(function ($attrData) {
            return new Attribute($attrData);
        }, $data->attr);
    }
}
