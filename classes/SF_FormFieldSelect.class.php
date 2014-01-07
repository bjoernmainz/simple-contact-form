<?php

/*
 * Creates a Select Field
 */

class SF_FormFieldSelect extends SF_FormField {


    public function renderSelect() {
        $options = trim($this->xml->options);
        $options = S::$C[$options][S::$CG['language']];

        $lang = S::$CL;
        $form = S::$F;
        $fn = S::$D['form_name'];
        $name = $this->label;

        $this->ff .= "<div id=\"{$name}_Div\" class=\"scf-field\">";
        $this->ff .= "<label for=\"$name\" id=\"{$name}_Label\">".$lang[$name].$this->mandatory.": </label>";
        $this->ff .="<select name='$name' id=\"{$name}_Field\">";
        $this->ff .= "<option></option>";

        foreach($options as $key => $value) {
            if(isset($form[$fn][$name]['value']) and $form[$fn][$name]['value'] == $value) {
                $this->ff .= "<option selected>$value</option>";
            }
            else {
                $this->ff .= "<option>$value</option>";
            }
        }
        $this->ff .= "</select>";
        $this->ff .= "<span id=\"{$name}_Error\"></span>";
        $this->ff .= "</div>\n";
    }



}


?>