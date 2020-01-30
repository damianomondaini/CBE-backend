<?php
require_once('Manager.php');

class OrdersManager extends Manager
{
    public function addOrderDb($value, $amount, $productId)
    {
        $db = $this->dbConnect();
        $order = $db->prepare("INSERT INTO orders (amount, `value`, idx_customer, idx_product, idx_status) VALUES (?, ?, 3, ?, 1)");
        $affectedLines = $order->execute(array($amount, $value, $productId));

        return $affectedLines;
    }

    public function assignOrderDb($orderId, $studentId)
    {
        $db = $this->dbConnect();
        $update = $db->prepare("UPDATE orders SET idx_cbe_student = ?, idx_status = 2 WHERE id_order = ?");
        $affectedLines = $update->execute(array($studentId, $orderId));

        return $affectedLines;
    }
}