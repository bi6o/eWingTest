<?php

$Control = array(
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
