<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'Controller/TestObjectController.php';

$renderer = new TestObjectController\TestObjectController();

$renderer->firstTask();
$renderer->firstExtraTask();
$renderer->secondExtraTask();
