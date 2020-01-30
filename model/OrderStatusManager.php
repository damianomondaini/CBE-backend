<?php

require_once('Manager.php');

class OrderStatusManager extends Manager
{
    public function declineOrderDb($orderId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("UPDATE orders SET idx_status = 4 WHERE id_order = ?");
        $affectedLines = $order->execute(array($orderId));

        return $affectedLines;
    }

    public function validateOrderDb($orderId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("UPDATE orders SET idx_status = 5 WHERE id_order = ?");
        $affectedLines = $order->execute(array($orderId));

        return $affectedLines;
    }

    public function acceptOrderDb($orderId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("UPDATE orders SET idx_status = 3 WHERE id_order = ?");
        $affectedLines = $order->execute(array($orderId));

        return $affectedLines;
    }

    public function cancelOrderDb($orderId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("UPDATE orders SET idx_status = 6 WHERE id_order = ?");
        $affectedLines = $order->execute(array($orderId));

        return $affectedLines;
    }
}
