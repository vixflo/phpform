<?php

namespace formgenerator\components;

class Paragraph
{
    public string $componentType;
    public string $clazz;
    public int $index;
    public string $value;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->clazz = $data->clazz;
        $this->index = $data->index;
        $this->value = $data->value;
    }
}
