<?php

//cargar modelo
require_once('models/User.php');
require_once('models/Product.php');
require_once('models/UserRepository.php');
require_once('models/ProductRepository.php');

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
    require_once('views/mainView.phtml');
}
