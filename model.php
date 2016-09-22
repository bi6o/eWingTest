<?php

include ('variables.php');

$xmlFile = '<main>';
$xmlFile .= file_get_contents('template.xml');
$xmlFile = str_replace("<var name=“TestRunName”>", "<var name='TestRunName'> </var>", $xmlFile);
$xmlFile = str_replace("<var name=“IterationNo”>", "<var name='IterationNo'> </var>", $xmlFile);
$xmlFile = str_replace("<var name=“RandomText”>", "<var name='RandomText'> </var>", $xmlFile);
$xmlFile = str_replace("<loop name=“Loop1”>", "<loop name='Loop1'>", $xmlFile);

$xmlFile .= '</main>';

$xmlObject = simplexml_load_string($xmlFile);

$objectConverted = simpleXmlElementToArray($xmlObject->loop);
$objectConverted = simpleXmlElementToArray($objectConverted['loop']);
var_dump($objectConverted);

function simpleXmlElementToArray($object) {
    $array = [];
    foreach ($object as $key => $value) {
        $array[$key] = $value;
    }
    return $array;
}

file_put_contents('result.txt', $xmlFile);
