<?php



/*
 * This class implements all the checks the user input can be checked against
 *
 */


class SF_Checker {
	
	private $ffn = NULL;
	private $P = NULL; # Shortcut for the post name
	private $__error = array();
	private $checked = False;
    private $error = NULL;
    protected $xml = NULL;
    # POST Value
    protected $pv = NULL;

    public function __construct($xml) {
        $this->xml = $xml;
        $this->label = trim($this->xml->label);

        $this->check_label_in_post();
        $this->check_is_required();
        $this->check_max_length();
        $this->check_min_length();
        $this->check_text(); // Filte_Sanitize_String
        $this->check_email();
        $this->check_terms();
        $this->check_select();
        $this->check_captcha();
        $this->custom_checks();
        $this->untaint();
    }

    # form_field is coming from the XML
    # So it should be in POST; if not we will exit in strict mode
	public function check_label_in_post() {
		if(!isset($_POST[$this->label])) {
            SF_Checker_Strict::check();
		}
        else {
            $this->pv =& $_POST[$this->label];
        }
	}
	
	private function append_error($error_message) {
		array_push($this->__error, $error_message);
	}

    # Copys the Post Value and the Error Message to the Session and applys some security functions to it
    # Checks if the value has been tested
	public function untaint() {
		if($this->checked == False) {
			$msg = "SF Fatal Error: {$this->label} is not checked by a function! Apply at least iamdump()";
            SF_Logger::log($msg);
			exit(0);
		}

        /*$this->pv = trim($this->pv);
        $this->pv = strip_tags($this->pv);
        $this->pv = stripslashes($this->pv);
        $this->pv = htmlentities($this->pv);
        $this->pv = SF_CheckUserInput::clean($this->pv);*/

        # Append Error and value to Formfield
        $fn = S::$D['form_name'];
	    S::$F[$fn][$this->label]['error'] = $this->__error;
        S::$F[$fn][$this->label]['value'] = $this->pv;
	}

    # If the field is a required value...
	public function check_is_required($custom_error=NULL) {
		if(isset($this->xml->required) && trim($this->xml->required) == "True" && (strlen($this->pv) == 0)) {
			(isset($custom_error)) ? $this->append_error($custom_error) : $this->append_error("REQ");

		}
	}
	
	public function check_min_length($custom_error=NULL) {

        if(isset($this->xml->minlength)) {
            $ml = trim($this->xml->minlength);
        }
        else {
            return(0);
        }

		if(strlen($this->pv) < $ml) {
			(isset($custom_error)) ? $this->append_error($custom_error) : $this->append_error("MINL");
		}
		$this->checked = True;
	}
	
	public function check_max_length($custom_error=NULL) {

        if(isset($this->xml->maxlength)) {
            $ml = trim($this->xml->maxlength);
        }
        else {
            return(0);
        }

        if(strlen($this->pv) > $ml) {
            (isset($custom_error)) ? $this->append_error($custom_error) : $this->append_error("MAXL");

            if(S::$CG['strict_checking'] == "1") {
                //TODO: TEST
                //$this->pv = substr($this->pv, $ml);
            }
        }

        $this->checked = True;
    }

	public function check_text($custom_error=NULL) {
		
		if(!strlen($this->pv) == 0) {
			$this->pv = filter_var($this->pv, FILTER_SANITIZE_STRING);
		}
		$this->checked = True;
	}

	public function check_email($custom_error=NULL) {
        if(trim($this->xml->type) == "email") {
		    if(!filter_var($this->pv, FILTER_VALIDATE_EMAIL)) {
			    (isset($custom_error)) ? $this->append_error($custom_error) : $this->append_error("MAIL");
		    }
		    $this->checked = True;
        }
	}
	
	public function check_terms($custom_error=NULL) {
        if(trim($this->xml->type) == "terms") {
		    if(!($this->pv == True)) {
			    (isset($custom_error)) ? $this->append_error($custom_error) : $this->append_error("FAL");
		    }
		    $this->checked = True;

        }
    }

    # Checks the options of a select field.
    # If a value is submitted that is not in the Array we will exit.

    public function check_select() {
        if(!(trim($this->xml->type) == "select")) {
            return(0);
        }
        else {
            $lang = S::$CG['language'];
            $options = trim($this->xml->options);
            $arr = S::$C[$options][$lang];

            if(strlen(trim($this->pv)) > 0 && !in_array($this->pv, $arr)) {
                SF_Logger::log("SF Warning: {$this->xml->type} -> {$this->label} -> {$this->pv} not in {$this->xml->options}");
                if(S::$CG['strict_checking'] == "1") {
                    echo("<h1>Internal Server Error</h1>");
                    exit(0);
                }
            }
            $this->checked = True;
        }
    }
	
	// TODO
	public function check_captcha($custom_error=NULL) {

        if(trim($this->xml->type) == "captcha") {
		// TODO
		    if($this->pv <> S::$D['Captcha_Result']) {
			    (isset($custom_error)) ? $this->append_error($custom_error) : $this->append_error("CAPTCHA");
                S::$D['Captcha_True'] = False;
                S::$D['Captcha_Remaining'] = 0;
		    }
            else {
                if(!isset(S::$D['Captcha_Remaining'])) {
                    S::$D['Captcha_True'] = True;
                    S::$D['Captcha_Remaining'] = 5;
                }
                else if(S::$D['Captcha_True'] == False) {
                    S::$D['Captcha_True'] = True;
                    S::$D['Captcha_Remaining'] = 5;
                }
                else {
                    S::$D['Captcha_Remaining'] -= 1;
                    if(S::$D['Captcha_Remaining'] == 0) {
                        S::$D['Captcha_True'] = False;
                    }
                }
            }
            $this->checked = True;
        }
    }

    //TODO: Quick Fick
    protected function custom_checks() {

        if(isset($this->xml->custom_tests)) {
            $tests = trim($this->xml->custom_tests);
            $tests = explode(",", $tests);
            $tmp = array();
            foreach ($tests as $v) {
                $v = trim($v);
                array_push($tmp, $v);
            }

            if(count($tmp) == 0) {
                return(0);
            }
            $tests = $tmp;

            foreach($tests as $test) {
               $filename = "custom_tests/".$test.".php";
               if(!file_exists($filename)) {
                   SF_Logger::log("SF Warning: {$this->label} Custom Test $filename does not exist");
               }
               else {
                   require_once($filename);
                   $result = $test($this->pv);
                   if(!($result == "OK")) {
                       $this->append_error($result);
                   }
               }
            }
        }
    }

}
?>