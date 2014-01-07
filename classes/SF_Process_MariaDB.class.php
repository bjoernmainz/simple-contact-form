<?php


class SF_Process_MariaDB {


    private $conn = NULL;
    private $db = NULL;
    private $us = NULL;
    private $tbl = NULL;
    private $ch = NULL;


    public function __construct() {

        $hs = S::$CDB['host'];
        $this->db = S::$CDB['database'];
        $this->us = S::$CDB['user'];
        $pw = S::$CDB['password'];
        $this->ch = S::$CDB['charset'];
        $this->tbl = S::$D['form_name'];

        try {
            $this->conn = new PDO('mysql:host='.$hs.';dbname='.$this->db.';charset='.$this->ch.'', $this->us, $pw);
            //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $p) {

            print H::debug_line();
            echo("<br />SF Fatal: ".$p->getMessage()."<br />");

            if($p->getCode() == 1049 || $p->getCode() == 1045) {
                    echo $p->getCode();
                    $this->prepare_database();
            }
            exit(-1);
        }

        try {
            $this->insert_data();
        }
        catch(PDOException $p) {
            echo("SF Fatal: ".$p->getMessage()."<br />");
        }
    }

    private function insert_data() {
        $fn = S::$D['form_name'];

        $fields = "";
        $params = "";

        foreach(S::$F[$fn] as $k => $v) {
            $k = strtolower($k);
            $k = str_replace("-", "", $k);
            $param = ":{$k}";
            $fields .= "{$k}, ";
            $params .= "{$param}, ";
        }

        $fields = trim($fields);
        $params = trim($params);
        $fields = substr($fields, 0, -1);
        $params = substr($params, 0, -1);

        $sql = "INSERT INTO {$this->tbl} ({$fields}) VALUES ({$params});";
        $prep = $this->conn->prepare($sql);

        foreach(S::$F[$fn] as $k => $v) {
            $k = strtolower($k);
            $key = str_replace("-", "", $k);
            $key = ":{$key}";
            $param = "{$v['value']}";

            //TODO
            $prep->bindValue($key, "$param");
        }

        //TODO
        if(!$prep->execute()) {
            $this->prepare_database();
        }
    }


    private function prepare_database($msg = NULL) {
        echo("<p>You have configured SCF to use a MySQL/MariaDB database, but there seems to be a problem.</p>");
        echo("<p>Please Reload the Page if done</p>");
        echo("<pre>");
        SF_Prepare_MariaDB::print_prepare();
        echo("</pre>");
    }


    public function __destruct() {
        $this->conn = NULL;
    }
}