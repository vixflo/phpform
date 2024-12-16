<?php

namespace formgenerator\components;

class Heading
{
    public string $componentType;
    public string $clazz;
    public ?int $index;
    public string $type;
    public string $value;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->clazz = $data->clazz;
        $this->index = $data->index;
        $this->type = $data->type;
        $this->value = $data->value;
    }
}
