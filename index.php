<?php

/*
 * Quick Fix: If not in Debug does nothing.
 * If in debug shows a list of all existing forms.
 *
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


if(!(S::$CG['debug'] == "1")) {
    exit(0);
}
else {
    $links = "";
    $forms = array();
    foreach (glob("*_form.php") as $file) {
        $links .= "<p><a href='{$file}'>{$file}</a></p>";
        array_push($forms, $file);
    }
    // TODO: $consistency = SF_Form_Consistency_Check::forms($forms);
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forms</title>
    <link rel="stylesheet" href="css/sf_main.css">
</head>

<body>
<?php echo H::debug_line(); ?>
<h1>Forms</h1>
<?php echo $links; //echo $consistency; ?>
<?php echo H::ds(); ?>
</body>
</html>

