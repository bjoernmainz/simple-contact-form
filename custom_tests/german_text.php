<?php

/*
 * Function checks the entered value against letters and signs that are generally used in german texts.
 * Allowed are all characters from A-z, ÄÖÜäöü, ß, dot, comma, hypen (minus), empty space,
 */

function german_text($value) {


    if(!preg_match("/^[a-zA-Z0-9äöüÄÖÜß,.-\s]+$/", $value)) {
        return("TEXT");
    }
    else {
        return("OK");
    }

}
