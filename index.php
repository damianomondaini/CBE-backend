<?php
session_start();
require('controller/card_designs_controller.php');
require('controller/main_controller.php');
require('controller/order_status_controller.php');
require('controller/orders_controller.php');
require('controller/products_controller.php');
require('controller/roles_controller.php');
require('controller/users_controller.php');
require('controller/shop_controller.php');
require('controller/dashboard_controller.php');


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
                    addOrder($_GET['productId'], $_POST['amount']);
                }
            break;
            case 'dashboard':
                if(isset($_GET['role']) && $_GET['role'] == 1)
                {
                    dashboardStudent();
                }
                elseif(isset($_GET['role']) && $_GET['role'] == 2)
                {
                    dashboardCustomer();
                }
                elseif(isset($_GET['role']) && $_GET['role'] == 3)
                {
                    dashboardAdmin();
                }
                else
                {
                    throw new Exception("Error: no role or you are unauthorized");
                }
            break;
            case 'declineOrder':
                if(isset($_GET['role']) && $_GET['role'] == 1 )
                {
                    if(isset($_GET['orderId']))
                    {
                        declineOrder($_GET['orderId']);
                    }
                    else
                    {
                        throw new Exception('Error: no order Id');
                    }
                }
                else
                {
                    throw new Exception('Error: no role');
                }
            break;
            case 'validateOrder':
                if(isset($_GET['role']) && $_GET['role'] == 1 )
                {
                    if(isset($_GET['orderId']))
                    {
                        validateOrder($_GET['orderId']);
                    }
                    else
                    {
                        throw new Exception('Error: no order Id');
                    }
                }
                else
                {
                    throw new Exception('Error: no role');
                }
            break;
            case 'assignOrder':
                if(isset($_GET['role']) && $_GET['role'] != 1 && isset($_GET['orderId']) && $_GET['orderId'] > 0 && isset($_POST['studentId']))
                {
                    assignOrder($_GET['orderId'], $_POST['studentId']);
                }
                else
                {
                    throw new Exception('Error: no role or you are unauthorized or form is not full');
                }
            break;
            case 'acceptOrder':
                if(isset($_GET['role']) && $_GET['role'] > 0 && isset($_GET['orderId']) && $_GET['orderId'] > 0)
                {
                    acceptOrder($_GET['orderId']);
                }
                else
                {
                    throw new Exception('Error: no role or you are unauthorized or no order id');
                }
            break;
            case 'cancelOrder':
                if(isset($_GET['role']) && $_GET['role'] > 0 && isset($_GET['orderId']) && $_GET['orderId'] > 0)
                {
                    cancelOrder($_GET['orderId']);
                }
                else
                {
                    throw new Exception('Error: no role or you are unauthorized or no order id');
                }
            break;
            case 'signUpPage':
                showSignUpPage();
            break;
            case 'signInPage':
                showSignInPage();
            break;
            case 'addAccount':
                if (isset($_POST['role']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']))
                {
                    addAccount($_POST['role'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password']);
                }
                else
                {
                    throw new Exception('Error: form isn not full');
                }
            break;
            case 'signIn':
                if (isset($_POST['email']) && isset($_POST['password']))
                {
                    signIn($_POST['email'], $_POST['password']);
                }
                else
                {
                    throw new Exception('Error: form isn not full');
                }
            break;
            case 'signOut':
                signOut();
            break;
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