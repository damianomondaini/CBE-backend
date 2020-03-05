<?php

require_once('./model/OrdersManager.php');

function addOrder($productId, $amount)
{
    if($_GET['productId'] === '1')
    {
        include './view/shop/forms/visitCard.php';
    }
    else if($_GET['productId'] === '2')
    {
        include './view/shop/forms/testForm2.php';
    }

    $value = [];
    for ($i=0; $i < count($labels); $i++) {
            if(isset($_POST[$labels[$i]]) && $_POST[$labels[$i]] != "")
            {
                $value[$labels[$i]] = $_POST[$labels[$i]];
            }
            else
            {
                $value = [];
                throw new Exception("Error: form isn't full");
                break;
            }
    }

    $value = base64_encode(serialize($value));

    $ordersManager = new OrdersManager();
    $affectedLines = $ordersManager->addOrderDb($value, $amount, $productId);

    if ($affectedLines === false)
    {
        throw new Exception("Error: Can't add your order");
    }
    else
    {
        header('Location: index.php?req=dashboard&role=2');
    }
}

function assignOrder($orderId, $studentId)
{
    $ordersManager = new OrdersManager();
    $affectedLines = $ordersManager->assignOrderDb($orderId, $studentId);

    if($affectedLines == false)
    {
        throw new Exception("Unable to assign order");
    }
    else
    {
        header('Location: index.php?req=dashboard&role=3');
    }
}