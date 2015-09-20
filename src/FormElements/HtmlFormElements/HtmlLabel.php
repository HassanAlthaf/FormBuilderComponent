<?php
namespace HassanAlthaf\Form\FormElements\HtmlFormElements;


use HassanAlthaf\Form\FormElements\HtmlFormElement;

class HtmlLabel extends HtmlFormElement
{
    const HTML_TAG_NAME = "label";

    private $displayName;

    /**
     * @param $displayName
     *
     * Sets text between the <label> and </label> tags.
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     *
     * Converts the element into Html code.
     */
    public function toHtml()
    {
        $htmlMarkup = "<" . self::HTML_TAG_NAME;

        foreach ($this->attributes as $attributeName => $attributeValue) {
            $htmlMarkup = $htmlMarkup . " " . $attributeName . "=\"" . $attributeValue . "\"";
        }

        $htmlMarkup = $htmlMarkup . ">" . $this->displayName . "</" . self::HTML_TAG_NAME . ">";

        return $htmlMarkup;
    }
}