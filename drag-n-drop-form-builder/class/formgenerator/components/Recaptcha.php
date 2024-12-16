<?php

namespace formgenerator\components;

class Recaptcha
{
    public string $componentType;
    public int $index;
    public string $privatekey;
    public string $publickey;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->index = $data->index;
        $this->privatekey = $data->privatekey;
        $this->publickey = $data->publickey;
    }
}
