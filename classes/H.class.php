<?php

/*
 *
 * H stands for Helper.
 * Some static Methods we use in DEBUG Mode.
 *
 */

class H {
    //TODO: Move the view related stuff to an own function
    # shows the header line in debug mode
    public static function debug_line() {
        if(S::$CG['debug'] == 1 or !isset(S::$CG['debug'])) {
            $o = "<div id='scf-debug-line'>";
            $o .= "<a href=\"index.php\">Index</a> | ";
            $o .= "<a href=\"".S::$D['form_name'].".php\">Back</a> | ";
        	$o .="<a href=\"".S::$D['form_name'].".php?destroy_session=1\">Destroy Session</a> | ";

            if(S::$CG['write_to_database'] == "1") {
                $o .="<a href=\"".S::$D['form_name'].".php?get_sql=1\">Get SQL</a> | ";
            }
            $o .="<a href=\"".S::$D['form_name'].".php?log=1\">Logfile</a> | ";
            $o .="Hint: Don't forget to destroy the session, when modifying the form xml.";
            $o .= "<br /></div>\n";
            return($o);
        }
        else {
            return(" ");
        }
    }

    public static function third_party() {
        $o = '<script type="text/javascript" src="third_party/jquery-1.10.2.min.js"></script>'."\n";
        return($o);
    }

    # dump session
    public static function ds() {
        if(S::$CG['debug'] == 1 or !isset(S::$CG['debug'])) {

            echo("<h1>Debug Info</h1><pre>");
            var_dump(S::$S);
            echo("</pre>");
        }
    }

    public static function error_level() {
        if(S::$CG['debug'] == 1) {
            error_reporting(E_ALL);
        }
        else {
            error_reporting(0);
        }
    }

}

function p($v) {

    if(!isset(S::$CL[$v])) {
        echo("<b>Warning: '$v' not set in Language File</b>");
    }
    else {
        echo S::$CL[$v];
    }
}



?>