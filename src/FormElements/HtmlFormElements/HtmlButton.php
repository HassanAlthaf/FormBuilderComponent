<?php
namespace HassanAlthaf\Form\FormElements\HtmlFormElements;

use HassanAlthaf\Form\FormElements\HtmlFormElement;

class HtmlButton extends HtmlFormElement
{
    const HTML_TAG_NAME = "button";

    private $buttonDisplayName;


    public function __construct($buttonDisplayName)
    {
        $this->buttonDisplayName = $buttonDisplayName;
    }

    /**
     * @param $buttonDisplayName
     *
     * Setting text between the <button> and </button> tags.
     */
    public function setButtonDisplayName($buttonDisplayName)
    {
        $this->buttonDisplayName = $buttonDisplayName;
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

        $htmlMarkup = $htmlMarkup . ">" . $this->buttonDisplayName . "</" . self::HTML_TAG_NAME .  ">";

        return $htmlMarkup;
    }
}