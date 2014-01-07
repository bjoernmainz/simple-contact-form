<?php


class SF_ChangeLanguage {

    # check if the language who has been set via $_GET is present in our
    # language array. if not, we will ignore it
    public static function cl() {

        $ol = S::$CG['language'];
        $nl = FALSE;

        if(isset($_GET['language']) && strlen($_GET['language']) == 2) {
            foreach(S::$C['language'] as $k => $v) {
                if($k === $_GET['language']) {
                    S::$CG['language'] = $_GET['language'];
                    $nl = $_GET['language'];
                    self::swap_select_fields($ol, $nl);
                }
            }
        }
        header("Location: ".S::$D['php_name']);
        exit(0);
    }

    # If the language is swapped this function will iterate trough the select fields
    # and swap oldlang[key] -> newlang[key]

    protected static function swap_select_fields($old_language, $new_language) {

        $ol = $old_language;
        $nl = $new_language;

        SF_FormName::f(S::$D['form_name']);
        $xml_name = SF_FormName::$xml_name;
        $config_folder = S::$CG['config_folder'];

        $xml = new SF_XML_Parser("{$config_folder}/{$xml_name}");

        foreach($xml->x->field as $key => $value) {
            if($value->type == "select") {

                $options = trim($value->options);
                $ff = trim($value->label);
                $old_value = S::$F[S::$D['form_name']][$ff]['value'];

                $old_options = S::$C[$options][$ol];
                $new_options = S::$C[$options][$nl];

                $old_key = array_search($old_value, $old_options);
                if(!($old_key === False)) {
                    S::$F[S::$D['form_name']][$ff]['value'] = $new_options[$old_key];
                }
            }
        }
    }
}


?>