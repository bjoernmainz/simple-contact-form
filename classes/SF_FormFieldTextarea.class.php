<?php


class SF_FormFieldTextarea extends SF_FormField {


   public function renderTextarea() {
       $lang = S::$CL;
       $form = S::$F;
       $fn = S::$D['form_name'];
       $name = $this->label;

       if(!isset($form[$fn][$name]["value"])) {
           $value = "";
       }
       else {
           $value = $form[$fn][$name]["value"];
       }

       if(!isset($this->xml->rows)) {
           $rows = 8;
       }
       else {
           $rows = $this->xml->rows;
       }

       if(!isset($this->xml->cols)) {
           $cols = 40;
       }
       else {
           $cols = $this->xml->cols;
       }

       $str_remaining = trim(S::$CL['Remaining']);

       $this->ff = "";
       $this->ff .= "<div id=\"{$name}_Div\" class=\"scf-field\">";
       $this->ff .= "<label for=\"$name\" id=\"{$name}_Label\">".$lang[$name].$this->mandatory.": </label>";
       $this->ff .= "<textarea name=\"$name\" id=\"{$name}_Field\" rows=\"$rows\" cols=\"$cols\" maxlength=\"{$this->maxlength}\">$value</textarea>";

       $l = strlen($this->maxlength);

       $this->ff .= "<span id=\"{$name}_Error\"></span>";
       $this->ff .= "<br /><span class=\"scf-remaining\">{$str_remaining}: <span id=\"{$name}_Remaining\" name=\"{$name}_Remaining\" />{$this->maxlength}</span></span>";
       $this->ff .= SF_Javascript::textarea_remaining_characters($name, $this->maxlength, $this->minlength, $str_remaining);
       $this->ff .= "</div>\n";
   }


}


?>