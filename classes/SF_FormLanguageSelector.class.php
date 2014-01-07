<?php


class SF_FormLanguageSelector {

	public static function create() {

        $selector = NULL;

		foreach(S::$C['language'] as $k => $v) {
			$selector .= "<a href=\"".S::$D['form_name'].".php?language=$k\">$k</a> | ";
			
		}
        # replace last line Hyphen
		$selector = substr_replace($selector ,"", -2, 2);
        return $selector;
	}
}


?>