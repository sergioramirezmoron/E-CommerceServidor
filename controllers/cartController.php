<?php
// Ver carrito
if (isset($_GET['cart'])) {
    $productsCart = ProductCartRepository::getCartProducts($_GET["cart"]);
    $products = [];
    foreach ($productsCart as $productCart) {
        $product = ProductRepository::getProductById($productCart->getIdProduct());
        $products[] = $product;
    }
    require_once('views/cartView.phtml');
    exit;
}

// Finalizar compra
if (isset($_POST["finishBuys"])) {
    require_once('views/soldView.phtml');
    exit;
}

