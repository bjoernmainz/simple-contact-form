<?php

/*
 * Class just calls the subclasses for building the Config
 *
 */

class SF_Config {

    public static function read_config_to_session($config_file) {
        if(!isset($_SESSION[SCF_NAMESPACE]['config']['general'])) {
            self::r_xml($config_file);
        }
    }

    public static function r_xml($config_file) {
        $config = new SF_Config_XML($config_file);
        SF_Config_XML_Select::read_select();
        SF_Config_XML_Language::read_lang();
    }
}








?>