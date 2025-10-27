<?php

// Añadir al carrito
if (isset($_GET['add'])) {
    $idCart = $_GET["cart"];
    $idProduct = $_GET["add"];
    ProductCartRepository::addProductToCart($idCart, $idProduct, 1);
    header('Location: index.php?c=cart&cart=' . $idCart);
    exit;
}

// Eliminar todo del carrito
if (isset($_POST['clearCart'])) {
    $idCart = $_GET["cart"];
    ProductCartRepository::clearCart($idCart);
    header('Location: index.php?c=cart&cart=' . $idCart);
    exit;
}

// Eliminar producto del carrito
if (isset($_POST["deleteProduct"])) {
    $idCart = $_GET["cart"];
    $idProduct = $_POST["idProduct"];
    ProductCartRepository::deleteProductFromCart($idCart, $idProduct);
    header('Location: index.php?c=cart&cart=' . $idCart);
    exit;
}
