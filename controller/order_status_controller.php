<?php

require_once('./model/OrderStatusManager.php');

function declineOrder($orderId)
{
    $orderStatusManager = new OrderStatusManager();
    $affectedLines = $orderStatusManager->declineOrderDb($orderId);
    
    if ($affectedLines === false)
    {
        throw new Exception("Impossible d'effectuer la commande");
    }
    else
    {
        header('Location: index2.php?req=dashboard&role=2');
    }
}
function validateOrder($orderId)
{
    $orderStatusManager = new OrderStatusManager();
    $affectedLines = $orderStatusManager->validateOrderDb($orderId);
    
    if ($affectedLines === false)
    {
        throw new Exception("Impossible d'effectuer la commande");
    }
    else
    {
        header('Location: index2.php?req=dashboard&role=1');
    }
}