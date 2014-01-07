<?php


class SF_FormFieldCaptcha extends SF_FormField {

    private function captcha_audio($number) {

        if(!(S::$CC['audio_show'] == "True")) {
            return("");
        }

        $lang = S::$CG['language'];

        $folder = S::$CC['path']."/".S::$CC['audio_files']."/".$lang;
        if(!file_exists($folder) or !is_dir($folder)) {
            SF:SF_Logger::log("SF Warning: Path to audio files does not exist");

            $folder = S::$CC['path']."/".S::$CC['audio_files']."/en";
            if(!file_exists($folder) or !is_dir($folder)) {
                SF_Logger::log("SF Warning: Fallback-Path to audio files does not exist");
                return("");
            }
        }

        $audio = "<p><audio controls>";
        $file = $folder."/".$number."_new.ogg";
        if(file_exists($file)) {
            $audio .= "<source src=\"{$file}\" type=\"audio/ogg\">";
        }
        $file = $folder."/".$number."_new.mp3";
        if(file_exists($file)) {
            $audio .= "<source src=\"{$file}\" type=\"audio/mpeg\">";
        }

        $audio .= "</audio></p>";
        return $audio;
    }

    # list.txt: nameoffile | content

    private function captcha_get_file_content($number) {
        //TODO
        $fhandle = fopen("config/list.txt.php", "r");
        while($line = fgets($fhandle)) {
            $line = explode("|", $line);
            if($number == $line[0]){
                $number=trim($line[1]);
                fclose($fhandle);
                return($number);
            }
        }
        fclose($fhandle);

    }

    public function renderCaptcha() {
        $lang = S::$CL;
        $form = S::$F;
        $divide = 2;
        $name = $this->label;


        $this->ff .= "<div id=\"{$name}_Div\" class=\"scf-field\">";
        $this->ff .= "<br /><br /><fieldset class=\"scf-captcha-fieldset\"><legend class=\"scf-captcha-legend\">Captcha</legend>";
        $this->ff .= "<label for=\"$name\" id=\"{$name}_Label\">".$lang[$name].$this->mandatory.": </label>";

        $path = S::$CC['path']."/".S::$CC['files'];

        $captcha_files = array();
        if(file_exists($path) and is_dir($path)) {
            $captcha_files = scandir($path);
        }
        else {
            SF_Logger::log("SF Warning: Captcha Path does not exist 1");
            return $this;
        }

        #TODO: Better to open and check the file.
        foreach($captcha_files as $key => $value) {
            if(!strpos($value,".png")) {
                unset($captcha_files[$key]);
            }
        }
        $captcha_files = array_values($captcha_files);

        $random = rand(0,count($captcha_files)-1);
        $number_tmp = str_replace(".png", "", $captcha_files[$random]);
        $number = $this->captcha_get_file_content($number_tmp);
        S::$D['Captcha_Result'] = intval($number) / intval($divide);

        if(S::$D['Captcha_True'] == True) {
            $value = S::$D['Captcha_Result'];
        }
        else {
            $value = "";
        }

        $captcha_file = $path."/".$captcha_files[$random];

        if(!file_exists($captcha_file)) {
            SF_Logger::log("SF Warning: Captcha File does not exist {$captcha_file}");
        }

        $this->ff .= "<img src=\"{$captcha_file}\" name=\"captcha\" class=\"scf-captcha-img\" alt='${lang['Captcha_Hint']}: $number' title='${lang['Captcha_Hint']}: $number'>";
        $this->ff .= "<input type=\"text\" name=\"$name\" value=\"{$value}\" class=\"scf-captcha-input\">";
        $this->ff .= "<p class=\"scf-captcha-hint\">".$lang['Captcha_Hint']."</p>";
        $this->ff .= $this->captcha_audio($number_tmp);
        $this->ff .= "</fieldset>";
        $this->ff .= "</div>\n";
    }

}

?>