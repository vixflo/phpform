<?php

namespace formgenerator\components;

class Hcaptcha
{
    public string $componentType;
    public int $index;
    public string $sitekey;
    public string $secretkey;
    public string $center;
    public string $size;
    public string $theme;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->index = $data->index;
        $this->sitekey = $data->sitekey;
        $this->secretkey = $data->secretkey;
        $this->center = $data->center;
        $this->size = $data->size;
        $this->theme = $data->theme;
    }
}
