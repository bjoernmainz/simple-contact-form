<?php

/*
 * This Processes the Form (sends the Mails) and shows the Thank you page
 */

$processor = new SF_Process();

$content = new SF_Parse_Content();
$content->form_thanks();

?>

