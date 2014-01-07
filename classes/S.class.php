<?php

/*
 *
 *
 * S stands for $_SESSION and Shortcut.
 * I really hate to type $_SESSION['foo']['bar']['region]
 * This will become someting like S::$FBR
 *
 *
 */

class S {
    public static $S = NULL;
    public static $C = NULL;
    public static $CC = NULL;
    public static $CDB = NULL;
    public static $CSV = NULL;
    public static $CG = NULL;
    public static $CI = NULL;
    public static $CL = NULL;
    public static $CU = NULL;
    public static $CM = NULL;

    public static $D = NULL;
    public static $DA = NULL;

    public static $E = NULL;

    public static $F = NULL;

    public static $LOG = NULL;

    public static $A = NULL;
    public static $ASF = NULL;
    public static $ARM = NULL;



    public static function shortcut() {

        self::$S =& $_SESSION[SCF_NAMESPACE];
        self::$C =& $_SESSION[SCF_NAMESPACE]['config'];
        self::$CDB =& $_SESSION[SCF_NAMESPACE]['config']['database'];
        self::$CSV =& $_SESSION[SCF_NAMESPACE]['config']['csv'];
        self::$CG =& $_SESSION[SCF_NAMESPACE]['config']['general'];
        self::$CC =& $_SESSION[SCF_NAMESPACE]['config']['captcha'];
        self::$CU =& $_SESSION[SCF_NAMESPACE]['config']['urls'];
        //TODO Warning: This sets also the variavle on the rightsite, if not present
        self::$CL =& $_SESSION[SCF_NAMESPACE]['config']['language'][self::$CG['language']];

        self::$D =& $_SESSION[SCF_NAMESPACE]['diag'];
        self::$DA =& $_SESSION[SCF_NAMESPACE]['diag']['actual_filename'];

        self::$E =& $_SESSION[SCF_NAMESPACE]['diag']['error'];

        self::$F =& $_SESSION[SCF_NAMESPACE]['form'];

        self::$LOG = $_SESSION[SCF_NAMESPACE]['config']['logfile'];


        self::$A = $_SERVER;
        self::$ASF = $_SERVER['SCRIPT_FILENAME'];
        self::$ARM = $_SERVER['REQUEST_METHOD'];

    }

    public static function set_form($form) {
        if(!isset($_SESSION[SCF_NAMESPACE]['form'][$form])) {
            $_SESSION[SCF_NAMESPACE]['form'][$form] = array();
        }
    }
}
?>
