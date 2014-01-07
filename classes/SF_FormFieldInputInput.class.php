<?php

/*
 *
 */

class SF_FormFieldInputInput extends SF_FormField {

    protected $prevalue = NULL;

    protected function preValue() {

        # Language is the Prevalue Tag
        if(isset($this->xml->language)) {

            $prevalue = array();
            $cnt = count($this->xml->language);

            if($cnt == 1) {
                $prevalue = trim($this->xml->language);
            }
            else if($cnt > 1) {
                for($i=0; $i<$cnt; $i++) {
                    $l = trim($this->xml->language[$i]->attributes());
                    $c = trim($this->xml->language[$i]);
                    $prevalue[$l] = $c;
                }
            }
            else {
                $prevalue = "";
            }

            $this->prevalue = $prevalue;
        }
    }

    protected function label() {
        $lang = S::$CL;
        $name = $this->label;
        $this->ff .= "<label for=\"$name\" id=\"{$name}_Label\">".$lang[$name].$this->mandatory.": </label>";
    }

    public function renderInput() {

        $fn = S::$D['form_name'];
        $actual_form = S::$F[$fn];

        $name = $this->label;

        $config = S::$CG;

        $this->preValue();

        # Value (pre-)echoed
        if(strlen($actual_form[$name]["value"]) > 0) {
            $value = $actual_form[$name]["value"];
        }
        else if(!($this->prevalue == NULL) and is_array($this->prevalue)) {
            foreach($this->prevalue as $k => $v) {
                if($config['language'] == $k) {
                    $value = $v;
                }
            }
        }
        else if(!($this->prevalue == NULL) and is_string($this->prevalue)) {
            $value = $this->prevalue;
        }
        else {
            $value = "";
        }

        $this->ff .= "<div id=\"{$name}_Div\" class=\"scf-field\">";
        $this->label();
        $this->ff .= "<input id=\"{$name}_Field\" type=\"{$this->xml->type}\" name=\"$name\" value=\"$value\" maxlength='".$this->maxlength."' />";
        $this->ff .= "<span id=\"{$name}_Error\" class=\"scf-error-detail\"></span>";
        $this->ff .= "</div>\n";
    }
}