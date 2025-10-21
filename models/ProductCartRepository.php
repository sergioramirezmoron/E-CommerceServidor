

<?php
class ProductCartRepository
{
    public static function addProductToCart($id, $idCart, $idProduct, $quantity)
    {
        $db = Connection::connect();
        $q = "INSERT INTO product_cart VALUES (null, $quantity, $idCart, $idProduct)";
        $result = $db->query($q);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public static function getCartProducts($idCart)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM product_cart WHERE id_cart = $idCart";
        $result = $db->query($q);
        $products = [];
        while ($row = $result->fetch_assoc()) {
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
        $q = "DELETE FROM product_cart WHERE id_product = $id";
        $result = $db->query($q);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateProductQuantity($id, $quantity)
    {
        $db = Connection::connect();
        $q = "UPDATE product_cart SET quantity = $quantity WHERE id = $id";
        $result = $db->query($q);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
