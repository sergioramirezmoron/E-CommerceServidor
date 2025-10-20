<?php
class CartRepository{

    public static function createCart($userId){
        $db = Connection::connect();
        $userId = intval($userId);
        $q = "INSERT INTO carts VALUES (null, $userId)";
        $insert = $db->query($q);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public static function getCartByUserId($userId){
        $db = Connection::connect();
        $userId = intval($userId);
        $q = "SELECT * FROM carts WHERE userId = $userId";
        $search = $db->query($q);
        if ($row = $search->fetch_assoc()) {
            return new Cart($row['id'], $row['userId']);
        } else {
            return false;
        }
    }

    public static function getCartById($id){
        $db = Connection::connect();
        $id = intval($id);
        $q = "SELECT * FROM carts WHERE id = $id";
        $search = $db->query($q);   

    }

    public static function deleteCart($id){
        $db = Connection::connect();
        $id = intval($id);
        $q = "DELETE FROM carts WHERE id = $id";
        $delete = $db->query($q);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public static function getCarts(){
        $db = Connection::connect();
        $q = "SELECT * FROM carts";
        $search = $db->query($q);
        $carts = [];
        while ($row = $search->fetch_assoc()) {
            $carts[] = new Cart(
                $row['id'],
                $row['userId']
            );
        }
        return $carts;

    }


}

