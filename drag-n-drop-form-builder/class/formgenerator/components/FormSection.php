<?php

namespace formgenerator\components;

use formgenerator\components\Button;
use formgenerator\components\Buttongroup;
use formgenerator\components\Checkboxes;
use formgenerator\components\Dependent;
use formgenerator\components\Fileuploader;
use formgenerator\components\Form;
use formgenerator\components\Hcaptcha;
use formgenerator\components\Heading;
use formgenerator\components\Html;
use formgenerator\components\Input;
use formgenerator\components\Paragraph;
use formgenerator\components\Radio;
use formgenerator\components\Recaptcha;
use formgenerator\components\Select;
use formgenerator\components\Textarea;

class FormSection
{
    public string $id;
    public string $componentType;
    public mixed $groupInputs;

    public Button $button;
    public Buttongroup $buttongroup;
    public Checkboxes $checkboxes;
    public Dependent $dependent;
    public Fileuploader $fileuploader;
    public Form $form;
    public Hcaptcha $hcaptcha;
    public Heading $heading;
    public Html $html;
    public Input $input;
    public Paragraph $paragraph;
    public Radio $radio;
    public Recaptcha $recaptcha;
    public Select $select;
    public Textarea $textarea;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->componentType = $data->componentType;
        // The component type is used to determine which class to instantiate
        switch ($data->componentType) {
            case 'button':
                $this->button = new Button($data->component);
                break;
            case 'buttongroup':
                $this->buttongroup = new Buttongroup($data->component);
                break;
            case 'checkbox':
                $this->checkboxes = new Checkboxes($data->component);
                break;
            case 'dependent':
                $this->dependent = new Dependent($data->component);
                break;
            case 'fileuploader':
                $this->fileuploader = new Fileuploader($data->component);
                break;
            case 'form':
                $this->form = new Form($data->component);
                break;
            case 'hcaptcha':
                $this->hcaptcha = new Hcaptcha($data->component);
                break;
            case 'heading':
                $this->heading = new Heading($data->component);
                break;
            case 'html':
                $this->html = new Html($data->component);
                break;
            case 'input':
                $this->input = new Input($data->component);
                break;
            case 'paragraph':
                $this->paragraph = new Paragraph($data->component);
                break;
            case 'radio':
                $this->radio = new Radio($data->component);
                break;
            case 'recaptcha':
                $this->recaptcha = new Recaptcha($data->component);
                break;
            case 'select':
                $this->select = new Select($data->component);
                break;
            case 'textarea':
                $this->textarea = new Textarea($data->component);
                break;
            default:
                break;
        }
    }

    /**
     * Retrieves the component of the form section.
     *
     * @return mixed The component of the form section.
     */
    public function getComponent()
    {
        // The component type is used to determine which class to return
        switch ($this->componentType) {
            case 'button':
                $component = $this->button;
                break;
            case 'buttongroup':
                $component = $this->buttongroup;
                break;
            case 'checkboxes':
                $component = $this->checkboxes;
                break;
            case 'dependent':
                $component = $this->dependent;
                break;
            case 'fileuploader':
                $component = $this->fileuploader;
                break;
            case 'form':
                $component = $this->form;
                break;
            case 'hcaptcha':
                $component = $this->hcaptcha;
                break;
            case 'heading':
                $component = $this->heading;
                break;
            case 'html':
                $component = $this->html;
                break;
            case 'input':
                $component = $this->input;
                break;
            case 'paragraph':
                $component = $this->paragraph;
                break;
            case 'radio':
                $component = $this->radio;
                break;
            case 'recaptcha':
                $component = $this->recaptcha;
                break;
            case 'select':
                $component = $this->select;
                break;
            case 'textarea':
                $component = $this->textarea;
                break;
            default:
                $component = null;
                break;
        }

        return $component;
    }
}
