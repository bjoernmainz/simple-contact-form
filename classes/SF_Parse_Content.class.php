<?php

/*
 * This class grabs the views, parses and displays them
 */


class SF_Parse_Content {

    public $content;

    protected function replace_version() {
        $this->content = preg_replace("/\%version\%/", S::$CG['scf_version'], $this->content);
    }

    public function form($lang="", $result="", $js="") {

        $r = "views/".S::$D['php_name'];
        require_once($r);
        $this->content = ob_get_clean(); // loads the buffered content
        $this->replace_version();
        $this->content = preg_replace("/\%language_selector\%/", $lang, $this->content);
        $this->content = preg_replace("/\%form\%/", $result, $this->content);
        $this->content = preg_replace("/\%debug_line\%/", H::debug_line(), $this->content);
        $this->content = preg_replace("/\%third_party\%/", H::third_party(), $this->content);

        $m = $js->error_message();
        $this->content = preg_replace("/\<\/body>/", $m."</body>", $this->content);

        echo $this->content;
    }

    public function form_thanks() {

        $r = "views/".S::$D['thx_name'];
        require_once($r);
        $this->content = ob_get_clean();
        $this->replace_version();
        //$this->content = preg_replace("/\%version\%/", S::$CG['scf_version'], $this->content);
        echo $this->content;

    }

}


?>