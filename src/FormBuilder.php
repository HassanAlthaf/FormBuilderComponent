<?php
namespace HassanAlthaf\Form;

interface FormBuilder
{
    public function addForm(Form $form, $formName);
    public function removeForm($formName);
    public function newForm(Array $formAttributes);
    public function addFormAttribute($attributeName, $attributeValue);
    public function removeFormAttribute($attributeName);
    public function saveForm($formName);
    public function addElement(FormElement $formElement, $elementName);
    public function removeElement($elementName);
    public function edit($formName);
    public function buildMarkup($name);
}