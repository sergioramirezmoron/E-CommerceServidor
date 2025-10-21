<?php
// Ver carrito
if (isset($_GET['cart'])) {
    $products = ProductCartRepository::getCartProducts($_GET["cart"]);
    require_once('views/cartView.phtml');
    exit;
}

// Finalizar compra
if (isset($_POST["finishBuys"])) {
    require_once('views/soldView.phtml');
    exit;
}
