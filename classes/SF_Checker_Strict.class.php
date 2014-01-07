<?php


class SF_Checker_Strict {


    public static function check() {
        if(S::$CG['strict_checking'] == "1") {
            ob_end_clean();
            echo("<h1>Internal Server Error</h1>");
            SF_Logger::log("SF Fatal Error: var is not defined in POST");
            exit(0);
        }
    }


}

?>