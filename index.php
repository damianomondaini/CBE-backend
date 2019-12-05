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
            if(isset($_GET['role']))
            {
                shop();
            }
            else
            {
                throw new Exception('Error: no ID');
            }
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