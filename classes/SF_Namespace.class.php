<?php


/*
 * Sets the Namespace in the Session
 * I don't want to interfere with Rest of the User-$_SESSION
 * so everything we need is kept unter $_SESSION[ns()]
 *
 * The namespace is the foldername (simple-contact-form)
 *
 */

class SF_Namespace {


    public static function ns() {
        $php_self = $_SERVER['PHP_SELF'];
        $dir = dirname($_SERVER['PHP_SELF']);
        $dir = explode("/", $dir);
        $name_space = end($dir);
        define("SCF_NAMESPACE", $name_space);
    }

}



?>