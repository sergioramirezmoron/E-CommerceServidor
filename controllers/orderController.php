<?php

if (isset($_GET['history']) && isset($_GET['id'])) {
    $userId = $_GET['id'];
    $orders = OrderRepository::getOrdersByUserId($userId);
    require_once 'views/orderHistoryView.phtml';
    exit();
}

?>