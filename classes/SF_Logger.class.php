<?php

class SF_Logger {

    public static function log($message = "") {
        self::weblog($message);
        self::logfile($message);

        if(S::$CG['debug'] == 1) {
            //echo $message;
            H::ds();
            echo("<pre>");
            var_dump($_SESSION);
            exit(-1);
        }
    }

    //TODO: Fix Quick Solution
    private static function logfile($message) {
        $log_file = S::$LOG['log_file'];
        $write_logfile = S::$LOG['write_logfile'];

        if(!($write_logfile == 1)) {
           return(0);
        }

        $today = date("m.d.y G:i:s");
        $m = "<tr><td>{$today}</td><td>{$message}</td></tr>\n";

        $fh = fopen($log_file, "a");
        if(is_resource($fh)) {
            echo $m;
            fwrite($fh, $m);
            fclose($fh);
        }
        else {
            echo("Couldn't open Logfile");
        }
    }
	
	public static function weblog($message = "") {
		
		
		if(!isset($message) or is_string($message) and strlen($message)==0) {
			error_log("No Error Message", 0);
			return(-1);
		}
		elseif(is_array($message) or is_object($message)) {
			$message = serialize($message);
		}

		error_log($message, 0);
	}
		
		
	public static function dump($variable) {
		echo("<pre>");
		var_dump($variable);
		echo("</pre>");
	}

}

?>