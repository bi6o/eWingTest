<?php

namespace TestObjectController;

require 'Service/TestObjectService.php';

class TestObjectController {

    public $testObjectService;
    public $testObjectNestedService;

    public function __construct() {
        $this->testObjectService = new \TestObjectService\TestObjectService('template.xml');
        $this->testObjectNestedService = new \TestObjectService\TestObjectService('template2.xml');
    }

    public function firstTask() {
        echo 'Task 1:';
        $this->testObjectService->renderFirstTask();
        echo '---------------------------------------------<br/>';

        return;
    }

    public function firstExtraTask() {
        echo 'Extra Task 1:';
        $this->testObjectService->renderFirstExtraTask();
        echo '---------------------------------------------<br/>';

        return;
    }

    public function secondExtraTask() {
        echo 'Extra Task 2:';
        $this->testObjectNestedService->renderSecondExtraTask();
        echo '---------------------------------------------<br/>';

        return;
    }

}
