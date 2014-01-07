<?php

/*
 * This creates the HTML form and prints it
 */


$js = new SF_Javascript;
$lang = SF_FormLanguageSelector::create();

# sets form_name in session
SF_FormName::f(S::$D['form_name']);
$xml_name = SF_FormName::$xml_name;

# This creates the formfields
$result = "";

//TODO: Prototype
$config_folder = S::$CG['config_folder'];

$xml = new SF_XML_Parser("{$config_folder}/{$xml_name}");

foreach($xml->x->field as $key => $value) {

    if(!isset($value->type) ) {
        SF_Logger::log(__CLASS__." -> ".__FUNCTION__." -> ".__FILE__." -> ".__LINE__." -> Type not set in XML {$xml_name}\n");
        continue;
    }
    if(!isset($value->label)) {
        SF_Logger::log(__CLASS__." -> ".__FUNCTION__." -> ".__FILE__." -> ".__LINE__." -> Label not set in XML {$xml_name}\n");
        continue;
    }

    if($value->type == "input") {
        $form = new SF_FormFieldInputInput($value);
        $form->renderInput();
    }
    else if($value->type == "hidden") {
        $form = new SF_FormFieldInputHidden($value);
        $form->renderInput();
    }
    else if($value->type == "email") {
        $form = new SF_FormFieldInputEmail($value);
        $form->renderInput();
    }
    else if($value->type == "select") {
        $form = new SF_FormFieldSelect($value);
        $form->renderSelect();
    }
    else if($value->type == "textarea") {
        $form = new SF_FormFieldTextarea($value);
        $form->renderTextarea();
    }
    else if($value->type == "terms") {
        $form = new SF_FormFieldTerms($value);
        $form->renderTerms();
    }
    else if($value->type == "captcha") {
        $form = new SF_FormFieldCaptcha($value);
        $form->renderCaptcha();
    }
    else if($value->type == "submit") {
        $form = new SF_FormFieldSend($value);
        $form->renderSend();
    }
    else {
        //TODO: Logging
        continue;
    }
    $result .= $form->get_ff();
}

# Parse some variables and show the content
$c = new SF_Parse_Content();
$c->form($lang, $result, $js);

# Set back the error message;
S::$E = array();
?>
