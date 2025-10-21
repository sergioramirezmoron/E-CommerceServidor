<?php

//Crear categoria
if (isset($_GET['create'])) {
    require_once('views/categoryView.phtml');
    exit;
}

//Guardar categoria
if (isset($_POST['createCategory'])) {
   
    if (!isset($_SESSION['user']) || !$_SESSION['user'] || !$_SESSION['user']->getRol()){
         header('Location: index.php'); exit; 
    }

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    
    if ($name !== '' && $description !== '') {
        CategoryRepository::addCategory($name, $description);
    }
    header('Location: index.php');
    exit;
}

require_once(__DIR__ . '/../models/CategoryRepository.php');

if (isset($_GET['create'])) {
    $categories = CategoryRepository::getAllCategories();
    require_once(__DIR__ . '/../views/createProductView.phtml');
    exit;
}