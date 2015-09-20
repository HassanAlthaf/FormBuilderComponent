<?php
namespace HassanAlthaf\Form\FormBuilders;

use HassanAlthaf\Form\Form;
use HassanAlthaf\Form\FormBuilder;
use HassanAlthaf\Form\FormElement;
use HassanAlthaf\Form\Forms\HtmlForm;

class HtmlFormBuilder implements FormBuilder
{
    private $forms = [];
    private $formUnderWork;

    public function __construct()
    {

    }

    /**
     * @param $formName
     *
     * Deletes a form from its uniquely identified key.
     */
    public function removeForm($formName)
    {
        unset($this->forms[$formName]);
    }

    /**
     * @param Array $formAttributes - Contains some form tag attributes.
     *
     * Replaces an existing under work form with a new fresh object.
     */
    public function newForm(Array $formAttributes)
    {
        $this->formUnderWork = new HtmlForm($formAttributes);
    }

    /**
     * @param $attributeName - <form> element attribute name
     * @param $attributeValue - <form> element attribute value
     *
     * A basic function to add attributes to the <form> element.
     */
    public function addFormAttribute($attributeName, $attributeValue)
    {
        if (is_object($this->formUnderWork)) {
            $this->formUnderWork->addFormAttribute($attributeName, $attributeValue);
        }
    }

    /**
     * @param $attributeName
     *
     * Remove an attribute from the <form> element by the $attributeName.
     */
    public function removeFormAttribute($attributeName)
    {
        if (is_object($this->formUnderWork)) {
            $this->formUnderWork->removeFormAttribute($attributeName);
        }
    }

    /**
     * @param $formName
     *
     * Saves a complete form to its forms collection array with the key specified as $formName
     */
    public function saveForm($formName)
    {
        $this->addForm($this->formUnderWork, $formName);
        $this->formUnderWork = null;
    }

    /**
     * @param Form $form - An object that implements the src interface.
     * @param String $formName - A form nickname to uniquely identify a form
     *
     * Stores a form model to the $forms array.
     */
    public function addForm(Form $form, $formName)
    {
        if (is_object($form)) {
            $this->forms[$formName] = $form;
        }
    }

    /**
     * @param FormElement $formElement
     * @param $elementName
     *
     * Takes in a FormElement interface implementing class, which represents a FormElement. Also takes in a $elementName just to uniquely identify the form.
     */
    public function addElement(FormElement $formElement, $elementName)
    {
        $this->formUnderWork->addFormElement($formElement, $elementName);
    }

    /**
     * @param $elementName
     *
     * Takes in a $elementName and removes a form element based on it.
     */
    public function removeElement($elementName)
    {
        $this->formUnderWork->removeFormElement($elementName);
    }

    /**
     * @param $formName
     *
     * Enables the ability to edit the form model by its unique name.
     */
    public function edit($formName)
    {
        $this->formUnderWork = $this->forms[$formName];
    }

    /**
     * @param $name
     * @return bool|string
     *
     * Builds the form markup so that it could be used.
     */
    public function buildMarkup($name)
    {
        $form = null;

        if ($name != null) {
            $form = $this->forms[$name];
        }

        if ($form instanceof Form) {
            $markup = "<form";

            foreach ($form->getFormAttributes() as $attributeName => $attributeValue) {
                $markup = $markup . " " . $attributeName . "=\"" . $attributeValue . "\"";
            }

            $markup = $markup . ">";

            foreach ($form->getFormElements() as $formElement) {
                $markup = $markup . $formElement->toHtml();
            }

            $markup = $markup . "</form>";

            return $markup;
        }

        return false;
    }
}