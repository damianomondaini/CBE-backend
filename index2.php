<?php
require('controller/card_designs_controller.php');
require('controller/main_controller.php');
require('controller/order_status_controller.php');
require('controller/orders_controller.php');
require('controller/products_controller.php');
require('controller/roles_controller.php');
require('controller/users_controller.php');
require('controller/shop_controller.php');

try
{
    if(isset($_GET['req']))
    {
        switch ($_GET['req'])
        {
            case 'shop':
                if(isset($_GET['role']) && $_GET['role'] != 1)
                {
                    showShop();
                }
                else
                {
                    throw new Exception('Error: role is not set or you are unauthorized');
                }
                break;
            case 'product':
                if(isset($_GET['role']) && $_GET['role'] != 1 && isset($_GET['productId']))
                {
                    showProduct($_GET['productId']);
                }
                else
                {
                    throw new Exception('Error: role is not set or you are unauthorized or your productId is not not correct');
                }
                break;
            case 'addOrder':
                if(isset($_GET['role']) && $_GET['role'] != 1 && isset($_GET['productId']) && isset($_POST['amount']))
                {
                    addOrder($_GET['productId'], $_POST['amount'], $_GET['productId']);
                }
                break;
            case 'dashboard': // TODO
                if(isset($_GET['role']) && $_GET['role'] == 1)
                {
                    dashboardStudent();
                }
                elseif(isset($_GET['role']) && $_GET['role'] == 2)
                {
                    dashboardCustormer();
                }
                elseif(isset($_GET['role']) && $_GET['role'] == 3)
                {
                    dashboardAdmin();
                }
                else
                {
                    throw new Exception("Error: no role or you are unauthorized");
                }
        }
    }
    else
    {
        showHomePage();
    }
}
catch (Exception $e)
{
    echo 'Error : ' . $e->getMessage();
}