

<?php
class ProductCartRepository
{
    public static function addProductToCart($idCart, $idProduct, $quantity)
    {
        $db = Connection::connect();

        $checkQuery = "SELECT * FROM product_cart WHERE id_cart = $idCart AND id_product = $idProduct";
        $checkResult = $db->query($checkQuery);

        if ($checkResult && $checkResult->num_rows > 0) {
            $row = $checkResult->fetch_assoc();
            $newQuantity = $row['quantity'] + $quantity;
            $updateQuery = "UPDATE product_cart SET quantity = $newQuantity WHERE id_cart = $idCart AND id_product = $idProduct";
            $result = $db->query($updateQuery);
        } else {
            $q = "INSERT INTO product_cart VALUES (null, $quantity, $idCart, $idProduct)";
            $result = $db->query($q);
        }

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

    public static function clearCart($idCart)
    {
        $db = Connection::connect();
        $idCart = intval($idCart);
        $q = "DELETE FROM product_cart WHERE id_cart = $idCart";
        $result = $db->query($q);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function finalizePurchase($idCart)
    {
        $db = Connection::connect();
        $q = "DELETE FROM product_cart WHERE id_cart = $idCart";
        $result = $db->query($q);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public static function getCartTotal($idCart)
    {
        $db = Connection::connect();
        $q = "SELECT SUM(price * quantity) FROM product_cart INNER JOIN products ON product_cart.id_product = products.id WHERE product_cart.id_cart = $idCart";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return $row['SUM(price * quantity)'];
        } else {
            return false;
        }
    }
}
