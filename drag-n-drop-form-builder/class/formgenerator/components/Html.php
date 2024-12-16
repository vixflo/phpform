<?php

namespace formgenerator\components;

class Html
{
    public string $componentType;
    public int $index;
    public string $value;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->index = $data->index;
        $this->value = $data->value;
    }
}
