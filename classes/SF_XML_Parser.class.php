<?


class SF_XML_Parser {

    public $x=NULL;

    public function __construct($xml_file) {
        // Todo check if file is a xml-file
        if (file_exists($xml_file)) {
            libxml_use_internal_errors(true);
            if(!$this->x = simplexml_load_file($xml_file)) {
                if(S::$CG['debug'] == "1") {
                    echo("<b>SF Fatal Error: A XML-File could not be loaded.<br /> Tip: Read the following error_dump. Undo your last changes.</b><br />");
                    foreach (libxml_get_errors() as $error) {
                        echo("<pre>");
                        var_dump($error);
                        echo("</pre>");
                    }
                }
                else {
                    SF_Logger::log(" SF FATAL ERROR: XML File could not be read.");
                }
                exit(-1);
            }
        } else {
            exit("SF Error: Could not load $xml_file");
        }
    }
}
?>
