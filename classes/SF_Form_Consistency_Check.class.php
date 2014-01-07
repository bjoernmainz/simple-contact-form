<?php


/*
 * Checks of all files of a given form are present
 * Makes no internal checks
 * //TODO:
 * TODO: Make internal checks
 */



class SF_Form_Consistency_Check {

    public static function forms($forms) {

        $errors = "Consistency Check: All files present.";
        $errors = "";
        if(count($forms) === 0) {
            return(0);
        }

        foreach($forms as $form) {
            $errors .= self::check($form);
        }

    return $errors;
    }

    protected static function check($form) {
            echo $form;
            $errors = "";
            if(!file_exists("views/{$form}")) {
               $errors .= "{$form} -> View is missing";
            }
    }
}
?>