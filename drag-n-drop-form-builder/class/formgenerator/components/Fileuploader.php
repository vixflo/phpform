<?php

namespace formgenerator\components;

class Fileuploader
{
    public string $componentType;
    public int $index;
    public string $label;
    public string $name;
    public string $helper;
    public string $width;
    public string $xml;
    public string $uploadDir;
    public string $limit;
    public string $extensions;
    public string $fileMaxSize;
    public string $thumbnails;
    public string $editor;
    public string $widthImg;
    public string $heightImg;
    public string $crop;

    public function __construct(\stdClass $data)
    {
        $this->componentType = $data->componentType;
        $this->index = $data->index;
        $this->label = $data->label;
        $this->name = $data->name;
        $this->helper = $data->helper;
        $this->width = $data->width;
        $this->xml = $data->xml;
        $this->uploadDir = $data->uploadDir;
        $this->limit = $data->limit;
        $this->extensions = $data->extensions;
        $this->fileMaxSize = $data->fileMaxSize;
        $this->thumbnails = $data->thumbnails;
        $this->editor = $data->editor;
        $this->widthImg = $data->widthImg;
        $this->heightImg = $data->heightImg;
        $this->crop = $data->crop;
    }
}
