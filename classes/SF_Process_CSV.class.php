<?php

/*
 * Class writes to a CSV File
 * Path of CSV is configured in config.ini
 * Filename is derived from form_name
 * Line is taken from SESSION -> Form -> actual form
 *
 */


class SF_Process_CSV {

    private $path = NULL;
    private $fh = NULL;
    private $date = NULL;

    public function __construct() {
        $this->date = date('d-m-Y_G:i:s');
        $this->path = S::$CSV['path']."/".S::$D['form_name'].".csv";
        $this->prepare_file();
        $this->prepare_data();
    }

    private function prepare_header() {
        $fn = S::$D['form_name'];

        $header = "";

        foreach(S::$F[$fn] as $k => $v) {
           $header .= "'".$k."';";
        }

        $header .= "'Date'\n";

        $this->write_to_file($header);
    }

    private function prepare_data() {
        $fn = S::$D['form_name'];
        $content = "";

        foreach(S::$F[$fn] as $k => $v) {
            $content .= "'".$v['value']."';";
        }

        $content .= "'{$this->date}'\n";

        $this->write_to_file($content);
    }

    private function prepare_file() {
            if(file_exists($this->path)) {

                if(!is_file($this->path) and !is_writable($this->path)) {
                    throw new Exception("SF Error: {$this->path} is not a file or not writable");
                }

                $this->fh = fopen($this->path, "a");
            }
            else {
                    $this->fh = fopen($this->path, "w");
            }

            if(!is_resource($this->fh)) {
                SF_Logger::log("SF Error: Could not open {$this->path}");
                return(-1);
            }

            $this->prepare_header();
    }

    private function write_to_file($line) {
       try {
           fwrite($this->fh, $line);
       }
       catch(Exception $e) {
           SF_Logger::log("SF Error: Couldn't write to File {$this->path}");
           exit(-1);
       }
    }

    public function __destruct() {
        if(is_resource($this->fh)) {
            fclose($this->fh);
        }
    }

}


?>