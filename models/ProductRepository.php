<?php

class ProductRepository
{
    public static function getAllProducts()
    {
        $db = Connection::connect();
        $q = "SELECT * FROM products";
        $result = $db->query($q);
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price'],
                $row['stock'],
                $row["idCategory"],
                $row['image']
            );
        }
        $db->close();
        return $products;
    }

    public static function getProductById($id)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM products WHERE id = $id";
        $result = $db->query($q);
        $product = null;
        if ($row = $result->fetch_assoc()) {
            $product = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price'],
                $row['stock'],
                $row["idCategory"],
                $row['image']
            );
        }
        $db->close();
        return $product;
    }

    public static function addProduct($name, $description, $price, $stock, $idCategory, $image)
    {
        $db = Connection::connect();
        $q = "INSERT INTO products VALUES (null, '$name', '$description', $price, $stock, $idCategory, '$image')";
        $db->query($q);
        $db->close();
    }

    public static function updateProduct($id, $name, $description, $price, $stock, $idCategory, $image)
    {
        $db = Connection::connect();
        $q = "UPDATE products SET name='$name', description='$description', price=$price, stock=$stock, idCategory=$idCategory, image='$image' WHERE id=$id";
        $db->query($q);
        $db->close();
    }

    public static function deleteProduct($id)
    {
        $db = Connection::connect();
        $q = "DELETE FROM products WHERE id=$id";
        $db->query($q);
        $db->close();
    }
}
