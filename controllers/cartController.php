<?php
// Finalizar compra
if (isset($_POST["finishBuys"])) {
    ProductCartRepository::finalizePurchase($_GET["cart"]);
    require_once('views/soldView.phtml');
    exit;
}
// Vaciar carrito
if (isset($_POST['clearCart'])) {
    $idCart = $_GET["cart"];
    ProductCartRepository::clearCart($idCart);
    header('Location: index.php?c=cart&cart=' . $idCart);
    exit;
}

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
