<?php


class SF_FormFieldTerms extends SF_FormField {


   public function renderTerms() {

        $lang = S::$CL;
        $form = S::$F;
        $fn = S::$D['form_name'];
        $name = $this->label;

        $this->ff .= "<div id=\"{$name}_Div\" class=\"scf-field-terms\">";
        $this->ff .= "<label for=\"$name\" id=\"{$name}_Label\">".$lang[$name].$this->mandatory.": </label>\n";
        $this->ff .= "<input type=\"hidden\" name=\"$name\" value=\"0\">\n";
        if($form[$fn][$name]["value"] == 1) {
            $this->ff .= "<input type=\"checkbox\" name=\"$name\" value=\"1\" maxlength=\"{$this->maxlength}\" checked />";
        }
        else {
            $this->ff .= "<input type=\"checkbox\" name=\"$name\" value=\"1\" maxlength=\"{$this->maxlength}\" />";
        }
        $this->ff .= "</div>\n";
   }






}


?>