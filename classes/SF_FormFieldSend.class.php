<?php

class SF_FormFieldSend extends SF_FormField {


    public function renderSend() {

        $name = $this->label;
        $value = S::$CL[$name];

        $this->ff .= "<div id=\"{$name}_Div\" class=\"scf-field\">";
        $this->ff = "<input type=\"submit\" name=\"$name\" value=\"$value\">";
        $this->ff .= "</div>\n";
    }

}



?>