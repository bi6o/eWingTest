<?php

class TestObject {

    public $xmlFile;

    public function __construct() {
        $this->addStartingTag();
        $this->readXmlFile();
        $this->fixXmlFile();
        $this->addEndingTag();
    }

    public function addStartingTag() {
        $this->xmlFile = '<main>';
        return $this;
    }

    public function readXmlFile() {
        $this->xmlFile .= file_get_contents('template.xml');
        return $this;
    }

    public function fixXmlFile() {
        $this->xmlFile = str_replace("<var name=“TestRunName”>", "<var name='TestRunName'> </var><br></br>", $this->xmlFile);
        $this->xmlFile = str_replace("<var name=“IterationNo”>", "<var name='IterationNo'> </var><br></br>", $this->xmlFile);
        $this->xmlFile = str_replace("<var name=“RandomText”>", "<var name='RandomText'> </var>", $this->xmlFile);
        $this->xmlFile = str_replace("<loop name=“Loop1”>", "<loop name='Loop1'>", $this->xmlFile);
        return $this;
    }

    public function addEndingTag() {
        $this->xmlFile .= '</main>';
        return $this;
    }

    public function insertValueOfVar($needle_start, $needle_end, $replacement) {
        $pos = strpos($this->xmlFile, $needle_start);
        $start = $pos === false ? 0 : $pos + strlen($needle_start);

        $pos = strpos($this->xmlFile, $needle_end, $start);
        $end = $pos === false ? strlen($this->xmlFile) : $pos;

        return $this->xmlFile = substr_replace($this->xmlFile, $replacement, $start, $end - $start);
    }

}
