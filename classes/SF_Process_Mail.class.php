<?php



class SF_Process_Mail {

    private $xml = NULL;
    private $placeholders = NULL;

    private $server = NULL;
    private $sender = NULL;
    private $subject = NULL;
    private $message = NULL;
    private $receivers = NULL;


    public function __construct() {

        $cf = S::$CG['config_folder'];
        $mc = S::$CG['mail_config'];
        $fn = S::$D['form_name'];

        $mc = $cf."/".$mc;
        $mc2 = $cf."/".$fn."_mail.xml";
        $x = "";


        if(file_exists($mc2)) {
            $x = $mc2;
        }
        elseif(file_exists($mc)) {
            $x = $mc;
        }
        else {
            $msg = "SF Warning: No Mail Config File Found - Searched for $mc and $mc2";
            if(S::$CG['debug'] == 1) {
                echo("$msg");
                SF_Logger::weblog($msg);
                exit(-1);
            }
            else {
                SF_Logger::weblog($msg);
            }

        }

        //TODO

        $this->xml = new SF_XML_Parser($x);
        $this->xml = $this->xml->x;
    }

    /*
     * This prepares the mail that is sent to the site owner
     */

    public function prepare_mail() {

        $fn = S::$D['form_name'];
        //TODO: Server is not used
        $this->server = $this->xml->server;
        $this->sender = $this->xml->sender;
        $this->subject = $this->xml->subject;
        $this->subject = $this->parse_placeholders($this->subject);
        $this->receivers = $this->h_explode(",", $this->xml->receivers);

        # prepare message
        foreach(S::$F[$fn] as $k => $v) {
            $this->message .= "$k: {$v['value']}<br />\n";
        }
        $this->send_mail();

        $this->message = NULL;
        $this->receivers = array();
    }

    public function prepare_confirmation_mail() {
        $fn = S::$D['form_name'];

        //TODO: Server
        $this->server = $this->xml->server;
        $this->sender = $this->xml->sender;
        #$this->subject = $this->xml->subject;

        # Mail Address
        if(!isset(S::$F[$fn]['E-Mail']['value'])) {
            SF_Logger::log("SF: Warning: Confirmation Mail Address not set.");
            return(-1);
        }
        else {
            $mail = S::$F[$fn]['E-Mail']['value'];

            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                SF_Logger::log("SF: Warning: Confirmation Mail Address seems not to be a valid Mail Address.");
                return(-1);
            }
        }
        $this->receivers = $this->h_explode(",", $mail);

        $this->subject = X::get_lang_from_node($this->xml->confirmation_subject);
        $this->subject = $this->parse_placeholders($this->subject);
        $this->subject = $this->parse_form_values($this->subject);

        $this->message = X::get_lang_from_node($this->xml->confirmation_text_header);
        $this->message = $this->parse_placeholders($this->message);

        $dont_show = $this->h_explode(",", $this->xml->hidden_fields_confirmation);
        foreach(S::$F[$fn] as $k => $v) {
            if(!in_array($k, $dont_show)) {
                $this->message .= "<br />$k: {$v['value']}\n";
            }
        }

        $this->message .= X::get_lang_from_node($this->xml->confirmation_text_footer);

        $this->message = $this->parse_placeholders($this->message);
        $this->message = $this->parse_salutation($this->message);
        $this->message = $this->parse_form_values($this->message);

        $this->send_mail();
    }

    private function parse_placeholders($string) {
        $fn = S::$D['form_name'];

        $string = str_replace('%form_name%', $fn, $string);
        $string = str_replace('%ticket_no%', S::$F[$fn]['Ticket_No']['value'], $string);
        $string = str_replace('%ip%', $_SERVER['REMOTE_ADDR'], $string);
        $string = str_replace('%br%', "<br />", $string);
        $string = str_replace('%p%', "<p>", $string);
        $string = str_replace('%/p%', "</p>", $string);


        return $string;
    }

    /*
     * parses the %salutation_sentence%
     */

    private function parse_salutation($string) {
        $fn = S::$D['form_name'];
        $node = $this->xml->salutation_sentence;
        $lang = S::$CG['language'];
        $sex = S::$F[$fn]['Salutation']['value'];
        $cnt = count($node);

        if(strpos($string, "%salutation_sentence%")) {
        for($i=0; $i < $cnt; $i++) {
            if($node[$i]->attributes()['lang'] == $lang) {
               if($node[$i]->attributes()['sex'] == $sex) {
                   $string = str_replace('%salutation_sentence%', $node[$i], $string);
               }
            }
        }
        }

        return $string;
    }

    /*
     * Uses the User submitted values
     * If a user has submitted the value City you can use this as %City%
     */

    private function parse_form_values($string) {
        $fn = S::$D['form_name'];
        foreach(S::$F[$fn] as $key => $value) {
            $string = str_replace("%{$key}%", S::$F[$fn][$key]['value'], $string);
        }
        return $string;
    }


    private function h_explode($limiter=",", $arr) {

        $tmp = array();

        if(is_string($arr)) {
            trim($arr);
            array_push($tmp, $arr);
        }
        else {
            $arr = explode($limiter, $arr);
            foreach($arr as $v) {
                $v = trim($v);
                array_push($tmp, $v);
            }
        }

        return $tmp;
    }


    private function send_mail() {

        foreach($this->receivers as $r) {
            $header  = 'MIME-Version: 1.0' . "\r\n";
            $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            $header .= 'To: '.$r. "\r\n";
            $header .= 'From: '.$this->sender. "\r\n";

            try {
                mail($r, $this->subject, $this->message, $header);
            }
            catch(Exception $e) {
                $message = "SF Error: $e";
                SF_Logger::log($message);
            }
        }
    }




}


?>