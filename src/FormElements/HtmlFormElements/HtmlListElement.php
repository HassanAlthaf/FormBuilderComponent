<?php
namespace HassanAlthaf\Form\FormElements\HtmlFormElements;

use HassanAlthaf\Form\FormElements\HtmlFormElement;

class HtmlListElement extends HtmlFormElement
{
    const HTML_TAG_NAME = "option";

    private $displayValue;

    /**
     * @param $displayValue
     *
     * Sets a value between the <option> and </option> tags.
     */
    public function setDisplayValue($displayValue)
    {
        $this->displayValue = $displayValue;
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

        $htmlMarkup = $htmlMarkup . ">" . $this->displayValue . "</" . self::HTML_TAG_NAME . ">";

        return $htmlMarkup;
    }
}