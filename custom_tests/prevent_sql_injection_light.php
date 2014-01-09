<?php

/*
 * Function checks string against some words i have in
 * many injections and that aren't used widely (like from) in english.
 */


function prevent_sql_injection_light($scf_string) {

    #$badwords = array("union", ";", "--", "root", "admin", "administrator");
    $badwords = array("union", "--", "root", "admin", "administrator", "eval");

    $len_before = strlen($scf_string);

    foreach($badwords as $badword) {
       $scf_string = str_ireplace($badword,"",$scf_string);
    }
    $len_after = strlen($scf_string);


    if($len_after !== $len_before) {
        return("FORBIDDEN_WORDS");
    }
    else {
        return("OK");
    }
}

?>