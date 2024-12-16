<?php

namespace formgenerator\components;

use formgenerator\components\Attribute;

class Plugin
{
    /** @var Attribute[] */
    public array $dataAttributes;
    public string $objectName;
    public string $pluginName;
    public bool $isjQuery;
    public string $jsConfig;
    public mixed $replacements;
    public string $selector;
    public ?string $title;
    public ?string $titleClass;
    public ?string $titleTag;
    public ?string $animation;
    public ?string $blur;
    public ?string $plain;
    public ?string $checkboxStyle;
    public ?string $radioStyle;
    public ?string $fill;
    public ?string $size;
    public ?string $animations;

    public function __construct(\stdClass $data)
    {
        $this->dataAttributes = array_map(function ($attrData) {
            return new Attribute($attrData);
        }, $data->dataAttributes);
        $this->objectName = $data->objectName;
        $this->pluginName = $data->pluginName;
        $this->isjQuery = $data->isjQuery;
        $this->jsConfig = $data->jsConfig;
        $this->replacements = $data->replacements;
        $this->selector = $data->selector;
        // set optional properties
        $this->title = $data->title ?? null;
        $this->titleClass = $data->titleClass ?? null;
        $this->titleTag = $data->titleTag ?? null;
        $this->animation = $data->animation ?? null;
        $this->blur = $data->blur ?? null;
        $this->plain = $data->plain ?? null;
        $this->checkboxStyle = $data->checkboxStyle ?? null;
        $this->radioStyle = $data->radioStyle ?? null;
        $this->fill = $data->fill ?? null;
        $this->size = $data->size ?? null;
        $this->animations = $data->animations ?? null;
    }
}
