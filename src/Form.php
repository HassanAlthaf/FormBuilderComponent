<?php
namespace HassanAlthaf\Form;

interface Form
{
    public function addFormAttribute($attributeName, $attributeValue);
    public function removeFormAttribute($attributeName);
    public function addFormElement(FormElement $formElement, $elementName);
    public function removeFormElement($elementName);
}