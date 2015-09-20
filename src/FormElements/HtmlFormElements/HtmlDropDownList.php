<?php
namespace HassanAlthaf\Form\FormElements\HtmlFormElements;

use HassanAlthaf\Form\FormElement;
use HassanAlthaf\Form\FormElements\HtmlFormElement;

class HtmlDropDownList extends HtmlFormElement
{
    const HTML_TAG_NAME = "select";

    private $listElements = [];

    /**
     * @param HtmlListElement $listElement
     * @param $name
     *
     * Adds a list element to the Drop down list
     */
    public function addListElement(FormElement $listElement, $name)
    {
        if(is_object($listElement)) {
            $this->listElements[$name] = $listElement;
        }
    }

    /**
     * @param $name
     *
     * Removing a list element based on the $name.
     */
    public function removeListElement($name)
    {
        if(isset($this->listElements[$name])) {
            unset($this->listElements[$name]);
        }
    }

    /**
     * @return string
     *
     * Converts the element into Html code.
     */
    public function toHtml()
    {
        $htmlMarkup = "<" . self::HTML_TAG_NAME;

        foreach($this->attributes as $attributeName => $attributeValue) {
            $htmlMarkup = $htmlMarkup . " " . $attributeName . "=\"" . $attributeValue . "\"";
        }

        $htmlMarkup = $htmlMarkup . ">";

        foreach($this->listElements as $listName => $listElement) {
            $htmlMarkup = $htmlMarkup . $listElement->toHtml();
        }

        $htmlMarkup = $htmlMarkup . "</select>";

        return $htmlMarkup;
    }
}