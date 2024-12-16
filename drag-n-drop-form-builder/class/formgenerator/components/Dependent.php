<?php

namespace formgenerator\components;

class Dependent
{
    public string $componentType;
    public int $index;
    public string $name;
    public string $value;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->index = $data->index;
        $this->name = $data->name;
        $this->value = $data->value;
    }
}
