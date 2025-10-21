<?php

// Añadir al carrito
if (isset($_GET['add'])) {
    $idCart = $_GET["cart"];
    $idProduct = $_GET["add"];
    ProductCartRepository::addProductToCart($idCart, $idProduct, 1);
    header('Location: index.php?c=cart&cart=' . $idCart);
    exit;
}
