<?php

class TestObject {

    public $xmlFile;

    public function __construct($file) {
        $this->addStartingTag();
        $this->readXmlFile($file);
        $this->fixXmlFile();
        $this->addEndingTag();
        file_put_contents('test2.txt', $this->xmlFile);
    }

    public function addStartingTag() {
        $this->xmlFile = '<main>';
        return $this;
    }

    public function readXmlFile($file) {
        $this->xmlFile .= file_get_contents($file);
        return $this;
    }

    public function fixXmlFile() {
        //A better way is to use regex to add closing tags to each var
        $this->xmlFile = str_replace("<var name=“TestRunName”>", "<var name=“TestRunName”> </var><br></br>", $this->xmlFile);
        $this->xmlFile = str_replace("<var name=“IterationNo”>", "<var name=“IterationNo”> </var><br></br>", $this->xmlFile);
        $this->xmlFile = str_replace("<var name=“RandomText”>", "<var name=“RandomText”> </var>", $this->xmlFile);
        $this->xmlFile = str_replace("<var name=“../RandomText”>", "<var name=“../RandomText”> </var><br></br>", $this->xmlFile);
        $this->xmlFile = str_replace(["“", "”"], "'", $this->xmlFile);
        file_put_contents('result3.txt', $this->xmlFile);
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
