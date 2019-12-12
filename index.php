<?php
require('controller/frontend.php');

try
{
    if (isset($_GET['action']))
    {
        if($_GET['action'] == 'test')
        {
            test();
        }
        elseif($_GET['action'] == 'shop')
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
            else
            {
                throw new Exception('Error: dashboard');
            }
        }
        elseif($_GET['action'] == 'declineOrder')
        {
            //ADD FUNCTION
        }
    }
    else
    {
        login();
    }
}
catch(Exception $e)
{
    echo 'Error : ' . $e->getMessage();
}