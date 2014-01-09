<?php



/*
 * Test Class: Prevent User Input
 */

class SF_CheckUserInput {



    public static function clean($scf_string) {

       $old_string = "";
       while(True) {
            $old_string = $scf_string;
            $scf_string = str_ireplace("--", "-", $scf_string);
            if($old_string == $scf_string) {
                break;
            }
       }
        return $scf_string;
    }

}



?>