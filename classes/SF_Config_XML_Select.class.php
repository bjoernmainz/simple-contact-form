<?php

/*
 * Searches for select_ config files and under the configuration path and reads them into the session
 */

class SF_Config_XML_Select {


    public static function read_select() {

        $lang = "";
        $result = array();
        $search = $_SESSION[SCF_NAMESPACE]['config']['general']['config_folder']."/*\.xml\.php";
        $globber = glob($search);

        foreach($globber as $fn) {
            $name = basename($fn);
            $name = explode("_", $name);

            if($name[0]== "select") {
                $xml  = simplexml_load_file($fn);
                $cnt = count($xml);

                for($i=0; $i<$cnt; $i++) {
                  $lang = trim($xml->option[$i]->attributes()['lang']);
                  if(!isset($result[$lang])) {
                      $result[$lang] = array();
                  }
                  array_push($result[$lang], trim($xml->option[$i]));
                }
                $name = str_replace(".xml.php", "", $name[1]);
                $_SESSION[SCF_NAMESPACE]['config'][$name] = $result;
                $result = array();
            }
        }
    }
}

?>