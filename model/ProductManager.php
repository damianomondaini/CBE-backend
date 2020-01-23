<?php
require_once('Manager.php');

class ProductManager extends Manager
{
    public function getProduct($productId)
    {
        $db = $this->dbConnect();
        $product = $db->prepare("SELECT * FROM products WHERE id_product = ?");
        $product->execute(array($productId));

        return $product;
    }
}