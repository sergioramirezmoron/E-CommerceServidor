<?php
require_once 'helpers/FileHelper.php';
// Delete
if (isset($_GET['delete'])) {
    ProductRepository::deleteProduct($_GET['id']);
    header("Location: index.php?c=product");
    exit();
}
//Create
if (isset($_GET["create"])) {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST["idCategoria"]) && isset($_FILES['productImage'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $idCategory = $_POST['idCategoria'];
        $productImagePath = null;

        if (isset($_FILES['productImage']) && isset($_FILES['productImage']['tmp_name']) && $_FILES['productImage']['error'] == 0) {
            $tmp = $_FILES['productImage']['tmp_name'];
            $fileName = $_FILES['productImage']['name'];
            if (FileHelper::fileHandler($tmp, "public/img/" . $fileName)) {
                $productImagePath = $fileName;
            }
        }

        $newId = ProductRepository::addProduct($name, $description, $price, $stock, $productImagePath, $idCategory);
        header("Location: index.php?c=product&id=" . $newId);
        exit();
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
