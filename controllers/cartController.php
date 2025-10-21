<?php
// Ver carrito
if (isset($GET['index'])){
    if (!isset($_SESSION['user']) || !$_SESSION['USER']){
        header ('Location: index-php?c=user&login=1');
        exit;
    }
    $userId = intval($_SESSION['user']->getId());
    $cartId = CartRepository::getCartByUserId($userId);
    $products = ProductCartRepository::getCartProducts($cartId);
    require_once('views/cartView.phtml');
}


// Añadir al carrito
if (isset($_POST['addToCart'])){
    if (!isset($_SESSION['user']) || !$_SESSION['USER']){
        header ('Location: index-php?c=user&login=1');
        exit;
    }
     $db       = Connection::connect();
    $userId   = (int)$_SESSION['user']->getId();
    $productId= isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $qty      = isset($_POST['qty']) ? max(1, (int)$_POST['qty']) : 1;
    $res = $db->query("SELECT id FROM carts WHERE user_id=$userId LIMIT 1");
    if ($row = $res->fetch_assoc()) {
        $cartId = (int)$row['id'];
    } else {
        $db->query("INSERT INTO carts (user_id) VALUES ($userId)");
        $cartId = (int)$db->insert_id;
    }

    ProductCartRepository::addProductToCart(null, $cartId, $productId, $qty);
    header('Location: index.php?c=cart&index=1'); exit;
}


//Eliminar del carrito
if (isset($_POST['deleteFromCart'])){
    if (!isset($_SESSION['user']) || !$_SESSION['USER']){
        header ('Location: index-php?c=user&login=1');
        exit;
    }


}

//Ver historial del carrito
if (isset($_GET['orders'])) {
    if (!isset($_SESSION['user']) || !$_SESSION['user']) { header('Location: index.php?c=user&login=1'); exit; }

    $db     = Connection::connect();
    $userId = (int)$_SESSION['user']->getId();
    $orders = [];
    $r = $db->query("SELECT id, total, created_at FROM orders WHERE user_id=$userId ORDER BY id DESC");
    if ($r) while ($o = $r->fetch_assoc()) $orders[] = $o;

    require_once('views/ordersView.phtml');
    exit;
}
// Vaciar el carrito
if (isset($_GET['clear'])) {
    if (!isset($_SESSION['user']) || !$_SESSION['user']) { header('Location: index.php?c=user&login=1'); exit; }

    $db     = Connection::connect();
    $userId = (int)$_SESSION['user']->getId();

    $res = $db->query("SELECT id FROM carts WHERE user_id=$userId LIMIT 1");
    if ($row = $res->fetch_assoc()) {
        $cartId = (int)$row['id'];
        $db->query("DELETE FROM productcarts WHERE idCart = $cartId");
    }
    header('Location: index.php?c=cart&index=1'); exit;
}

//Ver si el carrito esta pagado
if (isset($_GET['paid'])) {
    if (!isset($_SESSION['user']) || !$_SESSION['user']) { header('Location: index.php?c=user&login=1'); exit; }
    $orderId = (int)$_GET['paid'];
    require_once('views/paidView.phtml');
    exit;
}
