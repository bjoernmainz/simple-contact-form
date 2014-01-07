<?php


/*
 * Initializes the SESSION and reads via SF_Config all config into the SESSION
 *
 */

class SF_Session {
	
	
	public static function start() {

        session_start();
        session_regenerate_id(True);
		$S = &$_SESSION[SCF_NAMESPACE];

        if(!isset($S['config'])) {
            $S['config'] = array();
        }

		if(!isset($S['diag'])) {
			$S['diag'] = array();
			$S['diag']['last_filename'] = NULL;
			$S['diag']['actual_filename'] = NULL;

            # The actual Captcha
            $S['diag']['Captcha_Result'] = "";
            # Captcha has been entered correct
            $S['diag']['Captcha_True'] = False;
            # if it has been entered correct, it will be shown 5 times, so the User does not have to enter it
            # see SF_Checker.php
            $S['diag']['Captcha_Remaining'] = 0;
			//$S['diag']['form_fields'] = array();

            $S['diag']['form_name'] = NULL;
            $S['diag']['xml_name'] = NULL;
            $S['diag']['php_name'] = NULL;
            $S['diag']['html_name'] = NULL;
            $S['diag']['thx_name'] = NULL;
            $S['diag']['form'] = array();
            $S['diag']['pass'] = False;
            $S['diag']['first_request_time'] = $_SERVER['REQUEST_TIME'];
		}
        $S['diag']['last_request_time'] = $_SERVER['REQUEST_TIME'];

        if(!isset($S['form'])) {
            $S['form'] = array();
        }

	}
}

?>