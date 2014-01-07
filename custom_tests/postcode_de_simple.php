<?php

/*
 * This function checks if it is possible that the entered value is a german postcode.
 *
 * It is assumed that a german postcode is a 5 digit long numeric code. Every position can be a numeric value
 * between 0-9.
 *
 * The function does not check, if the entered code really exists.
 */

function postcode_de_simple($scf_string) {

    if(strlen($scf_string) == 0) {
        return("OK");
    }

    if(!preg_match("/^\d{5}$/", $scf_string)) {
        return("NO_GERMAN_ZIP");
    }
    else {
        return("OK");
    }
}

?>



