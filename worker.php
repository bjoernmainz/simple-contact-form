<?php

/*
 * This is the main file. It sets up everything and controls the routing between the states
 */

ob_start();

##############
# Autoloader #
##############

function scf_autoloader($className){
    include_once 'classes/' . $className . '.class.php';
}

spl_autoload_register('scf_autoloader');

###############################################
# Start Session and Shortcut / Set Errorlevel #
###############################################

SF_Namespace::ns(); // Namespace is the foldername
SF_Session::start(); // Starts the session and inits some values if they have not been set:
SF_Config::read_config_to_session("config/config.xml.php"); // reads all basic config files (config.xml, language.xml)

S::shortcut(); // Sets up some Shortcuts to the Session Variables (S::CG)
H::error_level(); // Report all error in Debug Mode - none in live mode
S::$DA = basename($_SERVER["REQUEST_URI"]);
SF_FormName::f($_SERVER['PHP_SELF']);

###########
# Routing #
###########

if(isset($_GET['destroy_session']) && $_GET['destroy_session'] == 1) {
    SF_SessionDestroy::d();
}

if(isset($_GET['get_sql']) && $_GET['get_sql'] == 1) {
    SF_Prepare_MariaDB::send_as_file_prepare();
}

if(isset($_GET['language'])) {
    SF_ChangeLanguage::cl();
}

if(isset($_GET['log'])) {
    SF_Logfile::show();
}

if(S::$CG['debug'] != "1" and S::$D['form_name'] == "template_form") {
    echo("Template can't be called in live mode!");
    exit(-1);
}

if (S::$ARM=="GET" && S::$D['pass']== False) {
	require_once("controller/form.php");
}
else if(S::$ARM=="POST") {
	require_once("controller/form_check.php");
}
else if(S::$D['pass'] == True) {
    require_once("controller/form_thanks.php");
}
else {
    SF_Logger::log("SF Warning: worker.php Fallback");
	require_once("controller/form.php");
}

#########################
# Dump Session Variable #
#########################

H::ds(); // dumps the Session

ob_flush();
?>
