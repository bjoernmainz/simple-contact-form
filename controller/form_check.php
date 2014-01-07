<?php

/*
 * This checks the Formvalues send by the user
 */

//TODO: Prototype

ob_start();

$xml_name = S::$D['xml_name'];

$pth = S::$CG['config_folder']."/".$xml_name;

//TODO: If Session is dead -> Check this in Controller
if(file_exists($pth) && !is_file($pth)) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit(0);
}

$xml = new SF_XML_Parser($pth);

# Based on the XML File the POST Content is parsed
# Values in POST who are not defined in the XML File will be dumped

foreach($xml->x->field as $key => $value) {
    $chk = new SF_Checker($value);
}
SF_CheckerError::check();

$location = S::$D['php_name'];
header("Location: $location");
exit(0);
?>