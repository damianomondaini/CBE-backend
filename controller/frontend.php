<?php

require_once('./model/TestManager.php');

function test()
{
    $testManager = new TestManager();

    $tests = $testManager->getGoals();

    require('./view/frontend/listTestsView.php');
}