<?php

/*
 * This class creates a .sql file based on the _form.xml
 */



class SF_Prepare_MariaDB {


    protected static function prepare() {

        if(! S::$CG['debug'] == 1) {
            return(0);
        }

        SF_FormName::f(S::$D['form_name']);
        $xml_name = SF_FormName::$xml_name;

        $db = S::$CDB['database'];
        $us = S::$CDB['user'];
        $pw = S::$CDB['password'];
        $ch = S::$CDB['charset'];
        $tbl = S::$D['form_name'];
        $length = "";
        $config_folder = S::$CG['config_folder'];

        $dbd = "CREATE DATABASE {$db} DEFAULT CHARACTER SET {$ch};\n\n";
        $dbd .= "USE {$db};\n\n";

        $sql = "CREATE TABLE IF NOT EXISTS `{$tbl}` (`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,\n";

        //TODO: CONFIG FROM Main Config File
        $xml = new SF_XML_Parser("{$config_folder}/{$xml_name}");

        foreach($xml->x->field as $key => $value) {

            if(isset($value->maxlength)) {
                $length = trim($value->maxlength);
            }
            else {
                $length = 1000;
            }

            if(!isset($value->label)) {
                SF_Logger::log(__CLASS__." -> ".__FILE__." -> ".__FUNCTION__.": Label not set in XML File");
            }
            else {
                $label = trim($value->label);
                $label = strtolower($label);
                $label = str_replace("-", "", $label);
                $sql .= "`".$label."` varchar({$length}),\n";
            }
        }

        $sql .= "`ticket_no` varchar(50),\n";
        $sql .= "`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,\n";
        $sql .= "`remoteserveraddress` varchar(255),\n";
        $sql .= "PRIMARY KEY (`id`)) ";
        $sql .= "CHARSET={$ch} AUTO_INCREMENT=1;\n\n";

        $user = "CREATE USER ".$us."@'localhost' IDENTIFIED BY '".$pw."';\n\n";
        $rights = "GRANT INSERT on {$db}.* to {$us} identified by '".$pw."';\n\n";
        $rights .= "FLUSH privileges;\n\n";

        $SQL = $dbd.$sql.$user.$rights;
        return($SQL);
    }

    public static function print_prepare() {
        $sql = self::prepare();
        print $sql;
    }

    public static function send_as_file_prepare() {
        $sql = self::prepare();
        $form_name = S::$D['form_name'];

        header('Content-Type: text/plain');
        header("Content-Disposition: attachment; filename={$form_name}.sql");
        print $sql;
        exit(0);
    }




}


?>