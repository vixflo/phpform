<?php

namespace formgenerator\components;

class Attribute
{
    public string $name;
    public ?string $value;

    public function __construct(\stdClass $data)
    {
        $this->name = (string) $data->name;
        if (property_exists($data, 'value')) {
            $this->value = (string) $data->value;
        }
    }
}
