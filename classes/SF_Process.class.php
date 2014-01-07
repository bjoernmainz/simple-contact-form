<?php

/*
 * This processes the Input (sends Mails, writes to CSV and DATABASE)
 * Generates a Ticket Number and Appends it to the User Data
 * calls all classes like mail, database etc.
 * Destroys the part of the session that is send
 */

//TODO: Mail to own class

class SF_Process {

    private $ticket_no = "";

    public function __construct() {

        # Session is expired TODO: may not the right place here
        if(!isset(S::$D['form_name'])) {
            header("Location: ./");
            exit(0);
        }

        $this->generate_ticket_no();
        $this->append_remote_server_address();

        if(S::$CG['send_mail'] == 1) {
            $mailer = new SF_Process_Mail();
            $mailer->prepare_mail();
            if(S::$CG['send_confirmation_mail'] == 1) {
                $mailer->prepare_confirmation_mail();
            }
        }

        if(S::$CG['write_to_csv'] == 1) {
            $csv = new SF_Process_CSV();
        }

        if(S::$CG['write_to_database'] == 1) {
            $database = new SF_Process_MariaDB();
        }

        $this->scf_destroy();
    }

    # Generate a Uniq Key as ticket number: First Letter of each field and date
    private function generate_ticket_no(){
        $fn = S::$D['form_name'];

        foreach(S::$F[$fn] as $k => $v) {
            $this->ticket_no .= substr($v['value'], 0, 1);
        }

        $this->ticket_no .= date('_jnyGis');
        $this->ticket_no = trim($this->ticket_no);

        S::$F[$fn]['Ticket_No'] = array();

        S::$F[$fn]['Ticket_No']['value'] = $this->ticket_no;

    }

    private function append_remote_server_address() {
        $fn = S::$D['form_name'];
        S::$F[$fn]['RemoteServerAddress'] = array();
        S::$F[$fn]['RemoteServerAddress']['value'] = $_SERVER['REMOTE_ADDR'];
    }

    private function scf_destroy() {
        # If in Debug: Instead of detroying the session we are setting back the pass value
        # The form will be displayed again in the formular
        //Todo: Bug
        if(S::$CG['debug'] == 1){
            S::$D['pass'] = False;
        }
        else {
            S::$D['pass'] = False;
            $fn = S::$D['form_name'];
            S::$F[$fn] = array();
        }

    }

}

