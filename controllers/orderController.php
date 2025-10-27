<?php

if (isset($_GET['history']) && isset($_GET['id'])) {
    $userId = $_GET['id'];
    $orders = OrderRepository::getOrdersByUserId($userId);
    require_once 'views/orderHistoryView.phtml';
    exit();
}

// Alternative history route for when called from user profile
if (isset($_GET['history']) && !isset($_GET['id']) && isset($_SESSION['user'])) {
    $userId = $_SESSION['user']->getId();
    $orders = OrderRepository::getOrdersByUserId($userId);
    require_once 'views/orderHistoryView.phtml';
    exit();
}

?>