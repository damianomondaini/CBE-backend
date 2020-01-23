<?php
require('controller/frontend.php');

try
{
    if (isset($_GET['action']))
    {
        if($_GET['action'] == 'shop')
        {
            if(isset($_GET['role']) && $_GET['role'] == 1)
            {
                shopTeacher();
            }
            else
            {
                throw new Exception('Error: no role');
            }
        }
        elseif($_GET['action'] == 'cardProduct')
        {
            if(isset($_GET['role']) && $_GET['role'] == 1)
            {
                cardProduct();
            }
            else
            {
                throw new Exception('Error: no role');
            }
        }
        elseif($_GET['action'] == 'addOrder')
        {
            if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['title']) && isset($_POST['amount']) && isset($_POST['design']) && isset($_GET['role']) && $_GET['role'] == 1)
            {
                if (isset($_POST['appointment']))
                {
                    $appointment = 1;
                }
                else {
                    $appointment = 0;
                }
                addOrder($_POST['firstName'], $_POST['lastName'], $_POST['title'], $_POST['amount'], $_POST['design'], $appointment);
            }
            else
            {
                throw new Exception('Error: invalid form');
            }
        }
        elseif($_GET['action'] == 'dashboard')
        {
            if(isset($_GET['role']) && $_GET['role'] == 1)
            {
                dashboardTeacher();
            }
            elseif(isset($_GET['role']) && $_GET['role'] == 0)
            {
                dashboardStudent();
            }
            elseif(isset($_GET['role']) && $_GET['role'] == 2)
            {
                dashboardBoss();
            }
            else
            {
                throw new Exception('Error: dashboard');
            }
        }
        elseif($_GET['action'] == 'declineOrder')
        {
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
        }
        elseif($_GET['action'] == 'validateOrder')
        {
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
        }
        elseif($_GET['action'] == 'assignUser')
        {
            if(isset($_GET['role']) && $_GET['role'] == 2 && isset($_GET['id']) && isset($_POST['eleve']))
            {
                assignUser($_GET['id'], $_POST['eleve']);
            }
            else
            {
                throw new Exception('Error: no role');
            }
        }
    }
    else
    {
        
    }
}
catch(Exception $e)
{
    echo 'Error : ' . $e->getMessage();
}