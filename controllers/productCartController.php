<?php
// Ver productos
if(isset($_GET["cart"])){
    $cartId = CartRepository::getCartByUserId($_SESSION['user']->getId());
    $productsCart = ProductCartRepository::getCartProducts($cartId);
    require_once('views/cartView.phtml');
    exit;
}
// Añadir al carrito
if (isset($_GET['add'])) {
    ProductCartRepository::addProductToCart(null, $cartId, $productId, $qty);
    header('Location: index.php?c=cart&cart=1');
    exit;
}

//Eliminar del carrito
if (isset($_POST['deleteFromCart'])) {
    if (!isset($_SESSION['user']) || !$_SESSION['USER']) {
        header('Location: index-php?c=user&login=1');
        exit;
    }
}

// Vaciar el carrito
if (isset($_GET['clear'])) {
    if (!isset($_SESSION['user']) || !$_SESSION['user']) {
        header('Location: index.php?c=user&login=1');
        exit;
    }

    $db     = Connection::connect();
    $userId = (int)$_SESSION['user']->getId();

    $res = $db->query("SELECT id FROM carts WHERE user_id=$userId LIMIT 1");
    if ($row = $res->fetch_assoc()) {
        $cartId = (int)$row['id'];
        $db->query("DELETE FROM product_cart WHERE idCart = $cartId");
    }
    header('Location: index.php?c=cart&cart=1');
    exit;
}