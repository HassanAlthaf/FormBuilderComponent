<?php
namespace HassanAlthaf\Form\FormElements\HtmlFormElements;

use HassanAlthaf\Form\FormElements\HtmlFormElement;

class HtmlInputField extends HtmlFormElement
{
    const HTML_TAG_NAME = "input";

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

        $htmlMarkup = $htmlMarkup . " />";

        return $htmlMarkup;
    }
}