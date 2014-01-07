<?php

/*
 * Function checks string against some words i have in
 * many injections and that aren't used widely (like from) in english.
 */


function prevent_sql_injection_light($scf_string) {

<<<<<<< HEAD
<<<<<<< HEAD
    $badwords = array("union", ";", "--", "root", "admin", "administrator");
=======
    $badwords = array("union", "--", "root", "admin", "administrator", "eval");
>>>>>>> 752937f... added eval
=======
    $badwords = array("union", "--", "root", "admin", "administrator", "eval");
>>>>>>> 1bd8342e3b37f82e09c752f5b15db6c51577900f
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