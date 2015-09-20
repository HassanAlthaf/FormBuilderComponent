<?php
namespace HassanAlthaf\Form\Forms;

use HassanAlthaf\Form\Form;
use HassanAlthaf\Form\FormElement;

class HtmlForm implements Form
{
    private $formAttributes = [];
    private $formElements = [];

    /**
     * @param array $formAttributes
     *
     * Takes in an array of $formAttributes for the <form> element
     */
    public function __construct(Array $formAttributes)
    {
        $this->formAttributes = $formAttributes;
    }

    /**
     * @param $attributeName
     * @param $attributeValue
     *
     * Enables a form attribute for the <form> element to be defined.
     */
    public function addFormAttribute($attributeName, $attributeValue)
    {
        $this->formAttributes[$attributeName] = $attributeValue;
    }

    /**
     * @param $attributeName
     *
     * Enables a form attribute for the <form> element to be removed based on the $attributeName.
     */
    public function removeFormAttribute($attributeName)
    {
        unset($this->formAttributes[$attributeName]);
    }

    /**
     * @return array
     *
     * Returns all <form> element attributes as an associative array.
     */
    public function getFormAttributes()
    {
        return $this->formAttributes;
    }

    /**
     * @param FormElement $formElement
     * @param $elementName
     *
     * Accepts a FormElement implementing class as an Element to be added to the <form> element.
     */
    public function addFormElement(FormElement $formElement, $elementName)
    {
        $this->formElements[$elementName] = $formElement;
    }

    /**
     * @param $elementName
     *
     * This method serves the ability to remove a form element based on the $elementName passed.
     */
    public function removeFormElement($elementName)
    {
        if (isset($this->formElements[$elementName])) {
            unset($this->formElements[$elementName]);
        }
    }

    /**
     * @return array
     *
     * Returns all the defined $formElements.
     */
    public function getFormElements()
    {
        return $this->formElements;
    }
}