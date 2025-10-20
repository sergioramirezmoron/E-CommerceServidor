<?php
require_once 'Order.php';

class OrderRepository{

    public static function getOrderById($id){
    $db = Connection::connect();
    $id = intval($id);
    $q = "SELECT * FROM orders WHERE id = $id";
    $search = $db->query($q);
    if ($row = $search->fetch_assoc()) {
        return new Order($row['id'], $row['status'], $row['date'], $row['idUser'], $row['idCart']);
    } else {
        return false;
    }
    }


    public static function getOrdersByUserId($userId){ 
    $db = Connection::connect();
    $userId = intval($userId);
    $q = "SELECT * FROM orders WHERE idUser = $userId";
    $search = $db->query($q);
    $orders = [];
    while ($row = $search->fetch_assoc()) {
            $orders[] = new Order($row['id'], $row['status'], $row['date'], $row['idUser'], $row['idCart']);
        }

        return $orders;
    }


    public static function createOrder($status, $date, $idUser, $idCart){
    $db = Connection::connect();
    $status = $db->real_escape_string($status);
    $date = $db->real_escape_string($date);
    $idUser = intval($idUser);
    $idCart = intval($idCart);
    $q = "INSERT INTO orders VALUES (null, '$status', '$date', $idUser, $idCart)";
    $insert = $db->query($q);
    if ($insert) {
        return true;
    } else {
        return false;
    }
    }

    public static function updateOrder($id, $status){
        $db = Connection::connect();
        $id = intval($id);
        $status = $db->real_escape_string($status);
        $q = "UPDATE orders SET status = '$status' WHERE id = $id";
        $update = $db->query($q);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteOrder($id){
        $db = Connection::connect();
        $id = intval($id);
        $q = "DELETE FROM orders WHERE id = $id";
        $delete = $db->query($q);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public static function getOrders(){
        $db = Connection::connect();
        $q = "SELECT * FROM orders";
        $search = $db->query($q);
        $orders = [];
        while ($row = $search->fetch_assoc()) {
            $orders[] = new Order(
            $row['id'],
            $row['status'],
            $row['date'],
            $row['idUser'],
            $row['idCart']
        ); 
        } 
        return $orders;
    }
}


    