<?php

class TestObject {

    public $xmlFile;
    public $nestedText;

    public function __construct($file) {
        $this->nestedText = '';
        $this->addStartingTag();
        $this->readXmlFile($file);
        $this->fixXmlFile();
        $this->addEndingTag();
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

    public function fillTemplateFromArray($array) {
        for ($i = 0; $i < count($array); $i++) {
            if (isset($array[$i]) && is_array($array[$i])) {
                $this->insertValueOfVar("<var name='IterationNo'>", '</var>', $array[$i]['IterationNo']);
                $this->insertValueOfVar("<var name='RandomText'>", '</var>', $array[$i]['RandomText']);
                $this->insertValueOfVar("Random text from this scope: <var name='RandomText'>", '</var>', $array[$i]['RandomText']);
                $this->insertValueOfVar("<var name='../RandomText'>", '</var>', isset($array[$i - 1]['RandomText']) ? $array[$i - 1]['RandomText'] : '');
                $this->nestedText .= $this->xmlFile;
            }
        }

        return $this;
    }

    public function nestedLoopsInTemplate($string, $loops) {
        $stringBetweenLoopTags = substr($string, strpos($string, " <loop name='") + 21);
        $this->xmlFile = $stringBetweenLoopTags;
        while (is_string($stringBetweenLoopTags) && $stringBetweenLoopTags != '') {
            $this->fillTemplateFromArray($loops);
            var_dump($stringBetweenLoopTags);
            $stringBetweenLoopTags = $this->nestedLoopsInTemplate($stringBetweenLoopTags, $loops);
        }

        $stringBetweenLoopTags = substr($stringBetweenLoopTags, 0, strpos($stringBetweenLoopTags, '</loop>'));
    }

}
