<?php

require_once('./model/TestManager.php');
require_once('./model/ShopTeacherManager.php');
require_once('./model/ShopStudentManager.php');
require_once('./model/ShopBossManager.php');

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
        header('Location: index2.php?req=dashboard&role=2');
    }
}

function declineOrder($orderId)
{
    $shopTeacherManager = new ShopTeacherManager();
    $affectedLines = $shopTeacherManager->declineOrderDb($orderId);
    
    if ($affectedLines === false)
    {
        throw new Exception("Impossible d'effectuer la commande");
    }
    else
    {
        header('Location: index.php?action=dashboard&role=1');
    }
}

function validateOrder($orderId)
{
    $shopTeacherManager = new ShopTeacherManager();
    $affectedLines = $shopTeacherManager->validateOrderDb($orderId);
    
    if ($affectedLines === false)
    {
        throw new Exception("Impossible d'effectuer la commande");
    }
    else
    {
        header('Location: index.php?action=dashboard&role=0');
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

function dashboardBoss()
{
    $shopBossManager = new ShopBossManager();
    $unassignedOrders = $shopBossManager->showOrders();
    $students = $shopBossManager->getStudents();

    require('./view/frontend/dashboardBossView.php');
}

function assignUser($idOrder, $idUser)
{
    $shopBossManager = new ShopBossManager();
    $affectedLines = $shopBossManager->assignUserDb($idOrder, $idUser);

    if ($affectedLines === false)
    {
        throw new Exception("Impossible d'effectuer la commande");
    }
    else
    {
        header('Location: index.php?action=dashboard&role=2');
    }
}