<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include ('Model/TestObject.php');
include ('variables.php');

$eWingTest = new TestObject('template.xml');


//Task1
echo 'Task1: ';
foreach ($Control['Loop1'] as $loop) {
    $eWingTest->insertValueOfVar("<var name='IterationNo'>", '</var>', $loop['IterationNo']);
    $eWingTest->insertValueOfVar("<var name='RandomText'>", '</var>', $loop['RandomText']);
    print_r($eWingTest->xmlFile);
}

echo '---------------------------------------------<br/>';

//Task2
echo 'TaskExtra 1: ';
foreach ($Control as $loops) {
    foreach ($loops as $loop) {
        $eWingTest->insertValueOfVar("<var name='IterationNo'>", '</var>', $loop['IterationNo']);
        $eWingTest->insertValueOfVar("<var name='RandomText'>", '</var>', $loop['RandomText']);
        print_r($eWingTest->xmlFile);
    }
}

echo '---------------------------------------------<br/>';

//Task3
echo 'TaskExtra 2:';
$eWingTest2 = new TestObject('template2.xml');
foreach ($Control as $loops) {
    $eWingTest2->fillTemplateFromArray($loops);
}
print_r($eWingTest2->nestedText);
