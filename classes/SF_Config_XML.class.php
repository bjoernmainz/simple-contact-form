<?php

/*
 * This File reads the base configuration .xml file into the session configuration
 */

class SF_Config_XML {

    private $structure = NULL;

    //http://stackoverflow.com/questions/6578832/how-to-convert-xml-into-array-in-php
    protected function XML2Array(SimpleXMLElement $parent) {

        $array = array();

        foreach ($parent as $name => $element) {
            ($node = & $array[$name])
            && (1 === count($node) ? $node = array($node) : 1)
            && $node = & $node[];

            $node = $element->count() ? $this->XML2Array($element) : trim($element);
        }
        return $array;
    }

    protected function push_in_array($array) {
        foreach($array as $key => $value) {
            if(is_array($value)) {
                $_SESSION[SCF_NAMESPACE][$key] = array();
                foreach($value as $k => $v) {
                    $_SESSION[SCF_NAMESPACE][$key][$k] = $v;
                }
            }
            else {
                $_SESSION[SCF_NAMESPACE][$key] = $value;
            }
        }
    }

    public function __construct($config_file) {
        $xml   = simplexml_load_file($config_file);
        $array = $this->XML2Array($xml);
        $array = array($xml->getName() => $array);
        $this->push_in_array($array);
    }
}
