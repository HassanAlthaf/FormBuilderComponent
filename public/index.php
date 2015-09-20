<?php
namespace HassanAlthaf\Form;

require_once __DIR__ . "/../src/Bootstrap.php";

/* Defining the FormBuilder as an HTMLFormBuilder by instantiating the HtmlFormBuilder class and also defining the <form> element attribute */
$formBuilder = new FormBuilders\HtmlFormBuilder();
$formBuilder->newForm(['method' => 'post', 'action' => '']);

/* Creating an HTML Input field */
$usernameField = new FormElements\HtmlFormElements\HtmlInputField();
$usernameField->addAttribute("type", "text");
$usernameField->addAttribute("name", "username");
$usernameField->addAttribute("placeholder", "Username");
$usernameField->addAttribute("class", "line-break");

/* Adding the created HTML Input field onto the Form Model class held by the builder */
$formBuilder->addElement($usernameField, 'usernameField');

/* Creating and adding a label */
$labelTest = new FormElements\HtmlFormElements\HtmlLabel();
$labelTest->addAttribute("for", "password");
$labelTest->setDisplayName('Password');

$formBuilder->addElement($labelTest, 'labelTest');

/* Creating and adding a password input friend */
$passwordField = new FormElements\HtmlFormElements\HtmlInputField();
$passwordField->addAttribute("type", "password");
$passwordField->addAttribute("name", "password");
$passwordField->addAttribute("placeholder", "Password");
$passwordField->addAttribute("id", "password");

$formBuilder->addElement($passwordField, 'passwordField');

/* Creating and adding a button */
$submitButton = new FormElements\HtmlFormElements\HtmlButton("Login");
$submitButton->addAttribute("name", "login");

$formBuilder->addElement($submitButton, 'submitButton');

/* Creating a radio button with two radio button options: $maleField and $femaleField */
$radioButton = new FormElements\HtmlFormElements\HtmlRadioButton("Gender");
$maleField = new FormElements\HtmlFormElements\HtmlInputField();
$maleField->addAttribute("value", "Male");
$maleField->addAttribute("type", "radio");

$femaleField = new FormElements\HtmlFormElements\HtmlInputField();
$femaleField->addAttribute("value", "Female");
$femaleField->addAttribute("type", "radio");

/* Requires exception to be caught */
try {
    $radioButton->addField($maleField, "male");
    $radioButton->addField($femaleField, "female");
} catch (\Exception $ex) {
    echo "<pre>";
    print_r($ex);
    echo "</pre>";
}

$formBuilder->addElement($radioButton, 'radioButton');

/* Creating a dropdownlist with 3 different list elements */
$dropDownList = new FormElements\HtmlFormElements\HtmlDropDownList();
$dropDownList->addAttribute("name", "vehicles");

$bugattiListElement = new FormElements\HtmlFormElements\HtmlListElement();
$bugattiListElement->setDisplayValue("Bugatti");
$bugattiListElement->addAttribute("value", "bugatti");

$lamborghiniListElement = new FormElements\HtmlFormElements\HtmlListElement();
$lamborghiniListElement->setDisplayValue("Lamborghini");
$lamborghiniListElement->addAttribute("value", "lamborghini");

$ferrariListElement = new FormElements\HtmlFormElements\HtmlListElement();
$ferrariListElement->setDisplayValue("Ferrari");
$ferrariListElement->addAttribute("value", "ferrari");

$dropDownList->addListElement($bugattiListElement, "bugatti");
$dropDownList->addListElement($lamborghiniListElement, "lamborghini");
$dropDownList->addListElement($ferrariListElement, "ferrari");

$formBuilder->addElement($dropDownList, 'dropDownList');

/* Creating a textarea element */
$textarea = new FormElements\HtmlFormElements\HtmlTextArea();
$textarea->setText("LOL");
$textarea->addAttribute('cols', '50');
$textarea->addAttribute('rows', '100');

$formBuilder->addElement($textarea, 'textareaTest');

/* Saving the form model in the $forms array in the FormBuilder class */
$formBuilder->saveForm("testForm");

/* Testing the ability to remove an element from the Form model. This removes the $textarea defined above.
Since the form is already saved, we have to call the edit method and then make modifications and save it again. */

$formBuilder->edit("testForm");
$formBuilder->removeElement('textareaTest');
$formBuilder->saveForm("testForm");

/* Displaying the markup after markup is built my builder */
echo $formBuilder->buildMarkup("testForm");

?>

<!-- Some CSS styling -->
<style type="text/css">
    .line-break {
        display: block;
    }
</style>
