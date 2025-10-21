<?php

//cargar modelo
require_once('models/User.php');
require_once('models/Product.php');
require_once('models/Cart.php');
require_once('models/Order.php');
require_once('models/Category.php');
require_once('models/ProductCart.php');
require_once('models/UserRepository.php');
require_once('models/ProductRepository.php');
require_once('models/CartRepository.php');
require_once('models/OrderRepository.php');
require_once('models/CategoryRepository.php');
require_once('models/ProductCartRepository.php');

session_start();
//consultas a la base de datos
$db = Connection::connect();

//inicializar sesión
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = false;
}

//mostrar vista
if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php');
} else {
    $products = ProductRepository::getAllProducts();
    $created = CartRepository::createCart($_SESSION['user'] ? $_SESSION['user']->getId() : 0);
    if ($created) {
        $cart = CartRepository::getCartByUserId($_SESSION['user'] ? $_SESSION['user']->getId() : 0);
        $productsCart = ProductCartRepository::getCartProducts($cart->getId());
    }
    require_once('views/mainView.phtml');
}
