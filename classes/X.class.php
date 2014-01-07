<?php

/*
 * X stands for XML
 * Contains static helper functions to parse XML Content
 *
 */

class X {

    public static function get_lang_from_node($node) {

        $lang = S::$CG['language'];
        $cnt = count($node);
        $result = "";

        for($i=0; $i < $cnt; $i++) {

            if($node[$i]->attributes() == $lang) {
                $result = $node[$i];
            }
        }

        return $result;
    }


}


?>