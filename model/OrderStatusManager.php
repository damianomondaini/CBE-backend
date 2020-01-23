<?php

require_once('Manager.php');

class OrderStatusManager extends Manager
{
    public function declineOrderDb($orderId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("UPDATE carte_visite SET etat='3' WHERE id_carte_visite=?");
        $affectedLines = $order->execute(array($orderId));

        return $affectedLines;
    }
    public function validateOrderDb($orderId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("UPDATE carte_visite SET etat='1' WHERE id_carte_visite=?");
        $affectedLines = $order->execute(array($orderId));

        return $affectedLines;
    }
}
