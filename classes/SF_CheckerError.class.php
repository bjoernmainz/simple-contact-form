<?php

/*
 * Checks if we have errors in the form fields
 * If we have no errors the pass variable will be set to true
 * so the form can be processed
 */

class SF_CheckerError {

    public static function check() {

        $error = 0;
        $fn = S::$D['form_name'];

        SF_FormName::f($fn);
        $xml_name = SF_FormName::$xml_name;

        $config_folder = S::$CG['config_folder'];

        $xml = new SF_XML_Parser("{$config_folder}/{$xml_name}");

        foreach($xml->x->field as $key => $value) {
            if(!isset($value->label)) {
                throw new Exception("Label not set in XML");
            }
            $label = trim($value->label);

             if(!isset(S::$F[$fn][$label]['error'])) {
                 $error = 1;
             }
             elseif(count(S::$F[$fn][$label]['error']) > 0) {
                 $error = 1;
             }
        }

        if($error === 0) {
            S::$D['pass'] = True;
        }
    }
}
?>