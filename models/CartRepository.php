<?php
class CartRepository
{

    public static function createCart($userId)
    {
        $db = Connection::connect();
        $q = "INSERT INTO carts VALUES (null, $userId)";
        $insert = $db->query($q);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public static function getCartByUserId($userId)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM carts WHERE id_user = $userId";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new Cart($row['id'], $row['id_user']);
        } else {
            return false;
        }
    }

    public static function getCartById($id)
    {
        $db = Connection::connect();
        $id = intval($id);
        $q = "SELECT * FROM carts WHERE id = $id";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new Cart($row['id'], $row['id_user']);
        } else {
            return false;
        }
    }

    public static function deleteCart($id)
    {
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

    public static function getCarts()
    {
        $db = Connection::connect();
        $q = "SELECT * FROM carts";
        $result = $db->query($q);
        $carts = [];
        while ($row = $result->fetch_assoc()) {
            $carts[] = new Cart(
                $row['id'],
                $row['id_user']
            );
        }
        return $carts;
    }
}
