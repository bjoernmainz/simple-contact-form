<?php



abstract class SF_FormField {

	protected $ff;
	protected $mandatory = "";
	protected $maxlength = 255;
    protected $minlength = 0;
    protected $xml;
    protected $label;

	public function __construct($xml) {
        $this->xml = $xml;
        $this->label = trim($this->xml->label);
        $this->set_maxlength();
        $this->set_minlength();
        $this->set_mandatory();
        $this->check_translation();
        $this->create_field_in_session();
    }

    protected function create_field_in_session() {
        $fn = S::$D['form_name'];

        # The form itself - should be set
        if (!isset(S::$F[$fn])) {
            S::$F[$fn] = array();
        }

        # The Formfield
        if(!isset(S::$F[$fn][$this->label])) {
            S::$F[$fn][$this->label]=array();
            S::$F[$fn][$this->label]['value'] = "";
            S::$F[$fn][$this->label]['error'] = array();
        }
    }
	
	public function set_mandatory() {
        if(isset($this->xml->required) and $this->xml->required == "True") {
		    $this->mandatory = "*";
        }
	}

	public function set_maxlength() {
        if(isset($this->xml->maxlength)) {
		    $this->maxlength = trim($this->xml->maxlength);
        }
        else {
            $this->maxlength = 255;
        }
	}
    public function set_minlength() {
        if(isset($this->xml->minlength)) {
            $this->minlength = $this->xml->minlength;
        }
        else {
            $this->minlength = 0;
        }
    }

    public function get_ff() {
        return $this->ff;
    }

    # checks if $name (label) is set in language file
	private function check_translation() {

        if(!isset(S::$CL[$this->label])) {
            $callers=debug_backtrace();
            $func = $callers[1]['function'];

            SF_Logger::log("<p>SF Error: `".__CLASS__."->".$func."->".__FUNCTION__."` {$this->label} is missing in language File</p>");
			$lang[$label] = $this->label;
		}
	}
}
?>