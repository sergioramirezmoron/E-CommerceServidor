<?php
if (isset($_GET['cart'])) {
    require_once('views/cartView.phtml');
    exit;
}

// Ver carrito
if (isset($GET['cart'])) {
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

//Ver historial del carrito
if (isset($_GET['orders'])) {
    if (!isset($_SESSION['user']) || !$_SESSION['user']) {
        header('Location: index.php?c=user&login=1');
        exit;
    }

    $db     = Connection::connect();
    $userId = (int)$_SESSION['user']->getId();
    $orders = [];
    $r = $db->query("SELECT id, total, created_at FROM orders WHERE user_id=$userId ORDER BY id DESC");
    if ($r) while ($o = $r->fetch_assoc()) $orders[] = $o;

    require_once('views/ordersView.phtml');
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
