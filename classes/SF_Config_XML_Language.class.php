<?php

/*
 * Class reads the language file into the session
 */


class SF_Config_XML_Language {


    public static function read_lang() {
        $word = ""; $name = ""; $lang = "";
        $result = array();
        $folder = $_SESSION[SCF_NAMESPACE]['config']['general']['config_folder'];
        $file= $_SESSION[SCF_NAMESPACE]['config']['general']['lang_config'];
        $fn = $folder."/".$file;

        if(!file_exists($fn)) {
            throw new Exception("Language File does not exist");
        }

        if(!$xml  = simplexml_load_file($fn)) {
            SF_Logger::log("SF_Fatal: Could not load {$fn}");
            exit(-1);
        }
        $cnt = count($xml);

        for($i=0; $i < $cnt; $i++) {
            $word = trim($xml->word[$i]);
            $name = trim($xml->word[$i]->attributes()['name']);
            $lang = trim($xml->word[$i]->attributes()['lang']);

            if(!isset($result[$lang])) {
                $result[$lang]=array();
            }
            $result[$lang][$name] = $word;
            if(!isset($result[$lang]) or !isset($result[$lang][$word])) {
                SF_Logger::log("Could not Set {$lang} -> {$word} -> {$name}");
            }
        }
        $_SESSION[SCF_NAMESPACE]['config']['language'] = $result;
    }
}
?>