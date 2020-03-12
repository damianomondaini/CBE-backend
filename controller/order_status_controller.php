<?php

require_once('./model/OrderStatusManager.php');

function declineOrder($orderId)
{
    $orderStatusManager = new OrderStatusManager();
    $affectedLines = $orderStatusManager->declineOrderDb($orderId);
    
    if ($affectedLines === false)
    {
        throw new Exception("Unable to decline order");
    }
    else
    {
        header('Location: index.php?req=dashboard');
    }
}

function validateOrder($orderId)
{
    $orderStatusManager = new OrderStatusManager();
    $affectedLines = $orderStatusManager->validateOrderDb($orderId);
    
    if ($affectedLines === false)
    {
        throw new Exception("Unable to validate order");
    }
    else
    {
        header('Location: index.php?req=dashboard');
    }
}

function acceptOrder($orderId)
{
    $orderStatusManager = new OrderStatusManager();
    $affectedLines = $orderStatusManager->acceptOrderDb($orderId);
    
    if ($affectedLines === false)
    {
        throw new Exception("Unable to accept order");
    }
    else
    {
        header('Location: index.php?req=dashboard');
    }
}

function cancelOrder($orderId)
{
    $orderStatusManager = new OrderStatusManager();
    $affectedLines = $orderStatusManager->cancelOrderDb($orderId);
    
    if ($affectedLines === false)
    {
        throw new Exception("Unable to cancel order");
    }
    else
    {
        header('Location: index.php?req=dashboard');
    }
}