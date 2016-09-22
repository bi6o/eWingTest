<?php

include ('Model/TestObject.php');
include ('variables.php');

$eWingTest = new TestObject();


//Task1
foreach ($Control['Loop1'] as $loop) {
    $eWingTest->insertValueOfVar("<var name='IterationNo'>", '</var>', $loop['IterationNo']);
    $eWingTest->insertValueOfVar("<var name='RandomText'>", '</var>', $loop['RandomText']);
    print_r($eWingTest->xmlFile);
}

//Task2
foreach ($Control as $loops) {
    foreach ($loops as $loop) {
        $eWingTest->insertValueOfVar("<var name='IterationNo'>", '</var>', $loop['IterationNo']);
        $eWingTest->insertValueOfVar("<var name='RandomText'>", '</var>', $loop['RandomText']);
        print_r($eWingTest->xmlFile);
    }
}

