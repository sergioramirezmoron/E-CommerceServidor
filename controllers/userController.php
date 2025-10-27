<?php
include_once("helpers/FileHelper.php");

//Logout
if (isset($_GET['logout'])) {
    $_SESSION['user'] = false;
    header('location:index.php');
    exit;
}

//profile
if (isset($_GET['profile'])) {
    require_once('views/profileView.phtml');
    exit;
}

//history
if (isset($_GET['history'])) {
    $userId = $_SESSION['user']->getId();
    $orders = OrderRepository::getOrdersByUserId($userId);
    require_once('views/orderHistoryView.phtml');
    exit;
}

//Register
if (isset($_GET['register'])) {
    require_once('views/registerView.phtml');
    exit;
}

if (isset($_POST["registerSubmit"])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_FILES['avatar'])) {
        $avatarPath = null;
        if (isset($_FILES['avatar']) && isset($_FILES['avatar']['tmp_name']) && $_FILES['avatar']) {
            $tmp = $_FILES['avatar']['tmp_name'];
            $name = $_FILES['avatar']['name'];
            if (FileHelper::fileHandler($tmp, "public/img/" . $name)) {
                $avatarPath = $name;
            }
        }
        $userCreated = UserRepository::register($_POST["username"], $_POST["password"], $_POST["password2"], $_POST["email"], $_POST["phone"], $avatarPath);
        if ($userCreated) {
            require_once('views/loginView.phtml');
            header('Location: index.php?c=user&login=1');
            exit;
        }
    }
    require_once('views/registerView.phtml');
    exit;
}

//Login
if (isset($_GET['login'])) {
    require_once('views/loginView.phtml');
    exit;
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION["user"] = UserRepository::login($_POST['username'], $_POST['password']);
    header('location:index.php');
}

//Default view
if (!$_SESSION['user']) {
    require_once('views/loginView.phtml');
    exit;
}
