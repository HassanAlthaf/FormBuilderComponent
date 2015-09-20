<?php
namespace HassanAlthaf\Form\FormElements;

/**
 * Class HtmlFormElement
 * @package HassanAlthaf\Form\FormElements
 *
 * An abstract class for HtmlFormElement.
 */
abstract class HtmlFormElement implements \HassanAlthaf\Form\FormElement
{
    protected $attributes = [];

    /**
     * @param $attributeName
     * @param $attributeValue
     *
     * Adding an attribute to the extending class.
     */
    public function addAttribute($attributeName, $attributeValue)
    {
        $this->attributes[$attributeName] = $attributeValue;
    }

    /**
     * @param $attributeName
     *
     * Removing an attribute from the extending class.
     */
    public function removeAttribute($attributeName)
    {
        unset($this->attributes[$attributeName]);
    }

    /**
     * @param $attributeName
     * @return bool
     *
     * Fetching an attribute value of the <form> element.
     */
    public function getAttribute($attributeName)
    {
        if (isset($this->attributes[$attributeName])) {
            return $this->attributes[$attributeName];
        }

        return false;
    }
}