

<?php
class ProductCartRepository
{
    public static function addProductToCart($id, $idCart, $idProduct, $quantity)
    {
        $db = Connection::connect();
        $q = "INSERT INTO product_cart VALUES (null, $quantity, $idCart, $idProduct)";
        $insert = $db->query($q);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }
    public static function getCartProducts($idCart)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM product_cart WHERE id = $idCart";
        $search = $db->query($q);
        $products = [];
        while ($row = $search->fetch_assoc()) {
            $products[] = new ProductCart(
                $row['id'],
                $row['quantity'],
                $row['id_cart'],
                $row['id_product']
            );
        }
        return $products;
    }

    public static function deleteProductFromCart($id)
    {
        $db = Connection::connect();
        $id = intval($id);
        $q = "DELETE FROM product_cart WHERE id = $id";
        $delete = $db->query($q);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateProductQuantity($id, $quantity)
    {
        $db = Connection::connect();
        $id = intval($id);
        $quantity = intval($quantity);
        $q = "UPDATE product_cart SET quantity = $quantity WHERE id = $id";
        $update = $db->query($q);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public static function getProducts()
    {
        $db = Connection::connect();

        $q = "SELECT * FROM product_cart";
        $search = $db->query($q);

        $products = [];
        while ($row = $search->fetch_assoc()) {
            $products[] = new ProductCart(
                $row['id'],
                $row['quantity'],
                $row['id_cart'],
                $row['id_product']
            );
        }
        return $products;
    }
}
