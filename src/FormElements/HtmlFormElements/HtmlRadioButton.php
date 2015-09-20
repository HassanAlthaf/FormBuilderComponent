<?php
namespace HassanAlthaf\Form\FormElements\HtmlFormElements;

use HassanAlthaf\Form\Exceptions\IncompatibleFieldException;
use HassanAlthaf\Form\FormElements\HtmlFormElement;
use HassanAlthaf\Form\FormElement;

class HtmlRadioButton extends HtmlFormElement
{
    const HTML_TAG_NAME = "input";

    private $fields = [];
    private $elementName;

    public function __construct($elementName)
    {
        $this->elementName = $elementName;
    }

    /**
     * @param FormElement $inputField
     * @param $name
     * @throws IncompatibleFieldException
     *
     * Adding a FormElement to the Radio button. Basically an input field of type radio.
     */
    public function addField(FormElement $inputField, $name)
    {
        if($inputField->getAttribute("type") == "radio") {
            $inputField->addAttribute("name", $this->elementName);
            $this->fields[$name] = $inputField;
        } else {
            throw new IncompatibleFieldException("Input field expected of type 'radio', found '" . $inputField->getAttribute("type") . ".'", 1);
        }
    }

    /**
     * @param $name
     *
     * Removes a field based on the name.
     */
    public function removeField($name)
    {
        unset($this->fields[$name]);
    }

    /**
     * @return string
     *
     * Converts the element into Html code.
     */
    public function toHtml()
    {
        $html = null;

        foreach($this->fields as $fieldName => $field) {
            $html = $html . $field->toHtml();
        }

        return $html;
    }
}