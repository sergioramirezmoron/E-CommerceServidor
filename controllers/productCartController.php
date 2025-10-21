<?php
// Ver productos
if (isset($_GET["cart"])) {
    $productsCart = ProductCartRepository::getCartProducts($_GET["cart"]);
    require_once('views/cartView.phtml');
    exit;
}
// Añadir al carrito
if (isset($_GET['add'])) {
    $idCart = $_GET["cart"];
    $idProduct = $_GET["add"];
    ProductCartRepository::addProductToCart(null, $idCart, $idProduct, 1);
    header('Location: index.php?c=cart&cart=' . $idCart);
    exit;
}

//Eliminar del carrito
if (isset($_POST['deleteFromCart'])) {
    if (!isset($_SESSION['user'])) {
        header('Location: index-php?c=user&login=1');
        exit;
    }
}
