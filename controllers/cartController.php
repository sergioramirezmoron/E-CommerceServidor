<?php
if (isset($_GET['cart'])) {
    require_once('views/cartView.phtml');
    exit;
}

// Ver carrito
if (isset($_GET['cart'])) {
    $cartId = CartRepository::getCartByUserId($_SESSION['user']->getId());
    $products = ProductCartRepository::getCartProducts($cartId);
    require_once('views/cartView.phtml');
    exit;
}

// Finalizar compra
if (isset($_POST["finishBuys"])) {
    require_once('views/soldView.phtml');
    exit;
}
