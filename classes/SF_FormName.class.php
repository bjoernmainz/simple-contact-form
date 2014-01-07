<?php

/*
 * Sets some Values in the Session
 *
 */

class SF_FormName {

    public static $form_name;
    public static $xml_name;
    public static $php_name;
    public static $html_name;
    public static $thx_name;


    public static function f($filename) {

        //TODO: check filename


        $f = basename($filename);
        $f = str_replace(".php", "", $f);
        $f = explode("_", $f);

        if(count($f) == 2 and $f[1] == "form") {
            self::$form_name = $f[0]."_".$f[1];
            self::$xml_name = self::$form_name."_form.xml.php";
            self::$php_name = self::$form_name.".php";
            self::$thx_name = self::$form_name."_thanks.php";
            self::$html_name = self::$form_name.".html";
            S::$D['form_name'] = self::$form_name;
            S::$D['xml_name'] = self::$xml_name;
            S::$D['php_name'] = self::$php_name;
            S::$D['html_name'] = self::$html_name;
            S::$D['thx_name'] = self::$thx_name;

            if(!isset(S::$F[self::$form_name])) {
                S::$F[self::$form_name] = array();
            }
        }
    }



}


?>