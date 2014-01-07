<?php


class SF_Logfile {

    private static function login() {
        header('WWW-Authenticate: Basic realm="SCF"');
        header('HTTP/1.0 401 Unauthorized');
        echo '<br />Please enter your username and password';
        exit;
    }

    private static function authenticate() {

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            self::login();
        }
        else {
            $username = S::$LOG['user'];
            $password = S::$LOG['password'];

            $s_user = $_SERVER['PHP_AUTH_USER'];
            $s_pass = $_SERVER['PHP_AUTH_PW'];

            if(S::$CG['debug'] == 0 && $s_pass = "12345") {
                echo("<br />Please change the password.");
                exit(0);
            }
            if(S::$CG['debug'] == 0 && $s_user = "scf") {
                echo("<br />Please change the username.");
                exit(0);
            }

            if(!($username == $s_user)) {
                self::login();
            }
            if(!($password == $s_pass)) {
                self::login();
            }

        }
    }

    public static function show() {

        self::authenticate();
        echo("<table>");
        require_once("log/log.txt.php");
        echo("</table>");
        exit(0);

    }



}



?>