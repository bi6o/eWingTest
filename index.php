<?php

require 'Controller/TestObjectController.php';

$renderer = new TestObjectController\TestObjectController();

$renderer->firstTask();
$renderer->firstExtraTask();
$renderer->secondExtraTask();
