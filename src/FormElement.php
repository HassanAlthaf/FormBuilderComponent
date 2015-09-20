<?php
namespace HassanAlthaf\Form;

interface FormElement
{
    public function addAttribute($attributeName, $attributeValue);
    public function removeAttribute($attributeName);
    public function getAttribute($attributeName);
}