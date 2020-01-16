<?php

require_once('./model/ProductManager.php');

function showShop()
{
    require('./view/shop/shopView.php');
}

function showProduct($productId)
{
    $productManager = new ProductManager();
    $product = $productManager->getProduct($productId);
    require('./view/shop/productView.php');
}