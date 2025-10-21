<?php
// Show Product
if (!isset($_GET['id'])) {
    $products = ProductRepository::getAllProducts();
    require_once 'views/mainView.phtml';
} else {
    $product = ProductRepository::getProductById($_GET["id"]);
    require_once 'views/productView.phtml';
}

?>