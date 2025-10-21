<?php
//Create
if (isset($_GET["create"])) {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_FILES['image'])) {
        $idCategory = isset($_POST['category']) ? $_POST['category'] : null;
        $productImagePath = null;
        if (isset($_FILES['productImage']) && isset($_FILES['productImage']['tmp_name']) && $_FILES['productImage']) {
            $tmp = $_FILES['productImage']['tmp_name'];
            $name = $_FILES['productImage']['name'];
            if (FileHelper::fileHandler($tmp, "public/img/products/" . $name)) {
                $productImagePath = $name;
            }

            $newId = ProductRepository::addProduct($name, $description, $price, $stock, $idCategory, $image);
            header("Location: index.php?c=product&id=" . $newId);
            exit();
        }
    }
    require_once 'views/createProductView.phtml';
    exit();
}

// Show Product
if (!isset($_GET['id'])) {
    $products = ProductRepository::getAllProducts();
    require_once 'views/mainView.phtml';
    exit();
} else {
    $product = ProductRepository::getProductById($_GET["id"]);
    require_once 'views/productView.phtml';
    exit();
}
