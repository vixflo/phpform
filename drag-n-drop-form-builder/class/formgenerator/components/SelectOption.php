<?php

namespace formgenerator\components;

class SelectOption
{
    public int $index;
    public string $text;
    public string $value;
    public string $groupname;

    public function __construct(\stdClass $data)
    {
        $this->index = $data->index;
        $this->text = $data->text;
        $this->value = $data->value;
        $this->groupname = $data->groupname;
    }
}
