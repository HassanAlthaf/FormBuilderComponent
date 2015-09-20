Form Builder Component
================

##Contents

[- What this is](#what-this-is)

[- How to use this](#how-to-use-this)

[- How to contribute](#how-to-contribute)

[- Credits](#credits)

##What this is

This is an easy-to-use Form Builder Component. It only is built currently for generating HTML form codes. But, I have
built this in such a way, that it would be easy to make it generate code for form codes in other languages maybe
because you are lazy to type all in yourself and want to do the job in an automated way.

##How to use this

It's quite simple to do that! Firstly, you need to require this in your composer.json file like this by running:

`composer require hassanalthaf/formbuildercomponent`

Once you run that, you will have it into your application.

Then, you simply need to:

```php
use \HassanAlthaf\Form;
```

That will enable you to use the Form Builder component. What you have to do next is to define a FormBuilder like this:
```php
$formBuilder = new FormBuilders\HtmlFormBuilder();

// Now, you need to define the attributes for the <form> element.

$formBuilder->newForm(['method' => 'post', 'action' => '']);

// Saving the form with a name to uniquely identify it. Note that it doesn't affect the name attribute of the form.

$formBuilder->saveForm("testForm");

// Showing the form.

echo $formBuilder->buildMarkup("testForm");
```

Once you have run the above code, and if you view your page source, you'll notice that the <form> element has been created. In this package,
there are various kinds of form elements you can create.

To create a label, all you have to do is write this code after the newForm(...) method call:

```php
$labelTest = new FormElements\HtmlFormElements\HtmlLabel();
$labelTest->addAttribute("for", "password");
$labelTest->setDisplayName('Password');

$formBuilder->addElement($labelTest, 'labelTest');
```
And for an input field, you do something like this:

```php
$passwordField = new FormElements\HtmlFormElements\HtmlInputField();
$passwordField->addAttribute("type", "password");
$passwordField->addAttribute("name", "password");
$passwordField->addAttribute("placeholder", "Password");
$passwordField->addAttribute("id", "password");

$formBuilder->addElement($passwordField, 'passwordField');
```

Quite simple yeah? Well, now you might wanna save all your code and try to view what it shows. You might notice a label and an input field for password.
Well done! You have got hold of the basics of how to use this. Next up, lets see how to use a TextArea.

```php
$textarea = new FormElements\HtmlFormElements\HtmlTextArea();
$textarea->setText("Example");
$textarea->addAttribute('cols', '5');
$textarea->addAttribute('rows', '5');

$formBuilder->addElement($textarea, 'textareaTest');
```
And now, once you save it, it will show you a decent and nice textarea.

Next up, we have the amazing buttons to submit data. This is an example button:

```php
$submitButton = new FormElements\HtmlFormElements\HtmlButton("Login");
$submitButton->addAttribute("name", "login");

$formBuilder->addElement($submitButton, 'submitButton');
```

Easy, yeah? Let us move onto something a bit more complicated than these basic form elements. Lets see how radio buttons are defined.

```php
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
    print_r($ex);
}
```

In the above code, you will notice a `$radioButton` variable. This is basically an instance of the HtmlRadioButton class. This class basically takes in an argument to define the name attribute of the radio button `<select>` element.
Once that is defined, you need to define the actual radio buttons which are the `<option>` elements. So in this example, I have created two. The `$maleField` and the `$femaleField.` And then after defining them, I just add them to the `$radioButton` class. And all I have to do is add the `$radioButton` class onto the `$formBuilder`. That is it!

Last but not the least, drop down lists!

```php
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
```

So in this above dropdown list, I basically created an object `HtmlDropDownList()` assigned to `$dropDownList` and then, I created list elements, namely: `$buggatiListElement`, `$lamborghiniListElement`, `$ferrariListElement`. After creating those list elements, I simply added them to the `$dropDownList` and then finally added the `$dropDownList` to the `$formBuilder`

That is basically it I believe! But what makes this more amazing is the fact that you are able to remove and change elements, attributes etc using PHP very easily!

Let us consider that after you save the form, you want to remove the textarea we created above, all we do is:

```php
$formBuilder->edit("testForm");
$formBuilder->removeElement('textareaTest');
$formBuilder->saveForm("testForm");

echo $formBuilder->buildMarkup("testForm");
```

That will remove it, simple as that.

##How to contribute

Do you want to contribute, but do not know how? Well, it is simple. You can always take a look at the pull requests, issues, etc and help others out. Or otherwise, if you want to contribute to the code base, you can always help me maintain the code base by adding more form elements, etc and optimizing the code time to time. Such helpers are highly welcome!

##Credits

Hassan Althaf - Main Developer <hassan [at] hassanalthaf [dot] com>
