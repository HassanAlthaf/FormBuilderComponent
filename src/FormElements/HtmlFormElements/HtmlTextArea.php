<?php
namespace HassanAlthaf\Form\FormElements\HtmlFormElements;

use HassanAlthaf\Form\FormElements\HtmlFormElement;

class HtmlTextArea extends HtmlFormElement
{
    const HTML_TAG_NAME = "textarea";

    private $textareaText;

    /**
     * @param $text
     *
     * Setting text between the <textarea> and </textarea> tag.
     */
    public function setText($text)
    {
        $this->textareaText = $text;
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

        $htmlMarkup = $htmlMarkup . ">" . $this->textareaText . "</" . self::HTML_TAG_NAME . ">";

        return $htmlMarkup;
    }
}