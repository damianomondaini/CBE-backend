<?php

require_once('./model/DashboardManager.php');


function dashboardStudent()
{
    $dashboardManager = new DashboardManager();
    $orders = $dashboardManager->showStudentOrders();

    require('./view/dashboard/dashboardStudentView.php');
}

function dashboardCustomer()
{
    $dashboardManager = new DashboardManager();
    $orders = $dashboardManager->showCustomerOrders();

    require('./view/dashboard/dashboardCustomerView.php');
}

function dashboardAdmin()
{
    $dashboardManager = new DashboardManager();
    $unassignedOrders = $dashboardManager->showAdminOrders();
    $students = $dashboardManager->getStudents();

    require('./view/dashboard/dashboardAdminView.php');
}
