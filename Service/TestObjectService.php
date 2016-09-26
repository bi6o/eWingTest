<?php

namespace TestObjectService;

include ('Model/TestObject.php');

class TestObjectService {

    public $eWingTest;
    public $control;

    public function __construct($file) {
        $this->eWingTest = new \TestObject($file);
        $this->control = array(
            "TestRunName" => "Test1",
            "Loop1" => array(
                array("IterationNo" => 1, "RandomText" => md5(rand(1, 100))),
                array("IterationNo" => 2, "RandomText" => md5(rand(1, 100))),
                array("IterationNo" => 3, "RandomText" => md5(rand(1, 100)))
            ),
            "Loop2" => array(
                array("IterationNo" => 4, "RandomText" => md5(rand(50, 100))),
                array("IterationNo" => 5, "RandomText" => md5(rand(50, 100))),
                array("IterationNo" => 6, "RandomText" => md5(rand(50, 100)))
            ),
            "Loop3" => array(
                array("IterationNo" => 7, "RandomText" => md5(rand(100, 1000))),
                array("IterationNo" => 8, "RandomText" => md5(rand(500, 2000))),
                array("IterationNo" => 9, "RandomText" => md5(rand(7, 99)))
            )
        );
    }

    public function renderFirstTask() {
        foreach ($this->control['Loop1'] as $loop) {
            $this->eWingTest->insertValueOfVar("<var name='IterationNo'>", '</var>', $loop['IterationNo']);
            $this->eWingTest->insertValueOfVar("<var name='RandomText'>", '</var>', $loop['RandomText']);
            print_r($this->eWingTest->xmlFile);
        }
    }

    public function renderFirstExtraTask() {
        foreach ($this->control as $loops) {
            if (is_array($loops)) {
                foreach ($loops as $loop) {
                    $this->eWingTest->insertValueOfVar("<var name='IterationNo'>", '</var>', $loop['IterationNo']);
                    $this->eWingTest->insertValueOfVar("<var name='RandomText'>", '</var>', $loop['RandomText']);
                    print_r($this->eWingTest->xmlFile);
                }
            }
        }
    }

    public function renderSecondExtraTask() {
        foreach ($this->control as $loops) {
            $this->eWingTest->nestedLoopsInTemplate($this->eWingTest->xmlFile, $loops);
            //$this->eWingTest->fillTemplateFromArray($loops);
        }
        //print_r($this->eWingTest->nestedText);
    }

}
