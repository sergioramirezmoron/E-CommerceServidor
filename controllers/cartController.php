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

//Ver si el carrito esta pagado
if (isset($_GET['paid'])) {
    if (!isset($_SESSION['user']) || !$_SESSION['user']) {
        header('Location: index.php?c=user&login=1');
        exit;
    }
    $orderId = (int)$_GET['paid'];
    require_once('views/paidView.phtml');
    exit;
}
