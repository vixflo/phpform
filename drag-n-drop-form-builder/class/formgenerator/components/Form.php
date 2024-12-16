<?php

namespace formgenerator\components;

use formgenerator\components\Plugin;

class Form
{
    public string $ajax;
    public string $attr;
    public string $framework;
    public string $iconFont;
    public string $iconFontUrl;
    public string $id;
    public string $layout;
    /** @var array<Plugin> $plugins */
    public array $plugins;
    public string $aftervalidation;
    public string $redirectUrl;
    public string $senderEmail;
    public string $recipientEmail;
    public string $subject;
    public string $senderName;
    public string $replyToEmail;
    public string $sentMessage;
    public string $dbTable;
    public string $dbPrimary;
    public string $dbFilter;

    public function __construct(\stdClass $data)
    {
        $this->ajax = $data->ajax;
        $this->attr = $data->attr;
        $this->framework = $data->framework;
        $this->iconFont = $data->iconFont;
        $this->iconFontUrl = $data->iconFontUrl;
        $this->id = $data->id;
        $this->layout = $data->layout;
        $this->plugins = array_map(function ($pluginData) {
            return new Plugin($pluginData);
        }, $data->plugins);
        $this->aftervalidation = $data->aftervalidation;
        $this->redirectUrl = $data->redirectUrl;
        $this->senderEmail = $data->senderEmail;
        $this->recipientEmail = $data->recipientEmail;
        $this->subject = $data->subject;
        $this->senderName = $data->senderName;
        $this->replyToEmail = $data->replyToEmail;
        $this->sentMessage = $data->sentMessage;
        $this->dbTable = $data->dbTable;
        $this->dbPrimary = $data->dbPrimary;
        $this->dbFilter = $data->dbFilter;
    }
}
