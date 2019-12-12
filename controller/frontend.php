<?php

require_once('./model/TestManager.php');
require_once('./model/ShopTeacherManager.php');
require_once('./model/ShopStudentManager.php');

function test()
{
    $testManager = new TestManager();
    $tests = $testManager->getGoals();

    require('./view/frontend/listTestsView.php');
}

function shopTeacher()
{
    require('./view/frontend/shopTeacherView.php');
}

function cardProduct()
{
    require('./view/frontend/cardProductView.php');
}

function addOrder($firstName, $lastName, $title, $amount, $design, $appointment)
{
    $shopTeacherManager = new ShopTeacherManager();
    $affectedLines = $shopTeacherManager->addOrderDb($firstName, $lastName, $title, $amount, $design, $appointment);

    if ($affectedLines === false)
    {
        throw new Exception("Impossible d'ajouter la commande");
    }
    else
    {
        header('Location: index.php?action=dashboard&role=1');
    }
}

function dashboardTeacher()
{
    $shopTeacherManager = new ShopTeacherManager();
    $orders = $shopTeacherManager->showOrders();

    require('./view/frontend/dashboardTeacherView.php');
}

function dashboardStudent()
{
    $shopStudentManager = new ShopStudentManager();
    $orders = $shopStudentManager->showOrders();

    require('./view/frontend/dashboardStudentView.php');
}