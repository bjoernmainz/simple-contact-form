<?php

//TODO: Rename to Javascript

class SF_Javascript {
	
	public $error = "";


	# Function prints the error message to the div error_message
	# and sets the color of missing or wrong fields
	# TODO: Print Error Message
	
	public function error_message() {	
		
        $fn = S::$D['form_name'];


		$error_message = "";
		$detail = "";
		$js = "";	
		$o = "";
		$errors = 0;
		
		if(!isset(S::$F)) {
			return(0);
		}
		
		foreach(S::$F[$fn] as $key => $value) {
			foreach(S::$F[$fn][$key] as $k => $v) {
				if ($k == "error") {
					$detail = "";
					if(count($v)>0) {
						$detail = $v[0];
						//foreach($v as $e) {
						//	$detail .= "$e, ";
						$errors += 1;
						//}
						//# Remove the last comma from detail
						//$detail = substr_replace($detail ,"", -2, 2);
						
						$detail = S::$CL[$detail];
						
                        $js .= "$('#{$key}_Label').addClass('scf-error-label');\n";
						$js .= "$('#{$key}_Error').addClass('scf-error-hint');\n";
                        //$js .= "$('#{$key}_Error').text('$detail');\n";
                        $js .= "$('#{$key}_Error').text('$detail');\n";
                        //$js .= "$('#{$key}_Field').focus(function() { $('#{$key}_Error').hide(700); });\n";
					}
				
			}	
		}
		if($errors == 1) {
			$error_message = S::$CL['error_message_singular'];
		}
		else if($errors > 1) {
			$error_message = S::$CL['error_message_plural'];
		}
		
		
	}

		$o .= "<script type=\"text/javascript\">";
		$o .= "$( document ).ready(function() {";
		$o .= "$('#error-message').text('$error_message');";
		$o .= "$js";
		$o .= "});";
		$o .= "</script>";
		return $o;
	}

    public static function textarea_remaining_characters($name, $maxlength, $minlength) {

        //TODO: Prototype Shows a little field with the remaining characters
        $script = "
        <script type=\"text/javascript\">

        function check_keyup() {
            var val = $('textarea#{$name}_Field').val();
            var text = $('textarea#{$name}_Field').text();

            val_len = val.length;
            //text_len = text.length; // text is the preenterend text

            var remaining = {$maxlength} - val_len;

            $('#{$name}_Remaining').text(remaining);
        }

        check_keyup();

        $( '#{$name}_Field' ).keyup(function() {
            check_keyup();
        });


        </script>";
        return $script;
    }

}
?>