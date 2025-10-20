<?php
class UserRepository
{
    public static function register($username, $password, $password2)
    {
        $db = Connection::connect();
        if ($password != $password2) {
            return false;
        }
        $encrypted = md5($password);
        $q = "INSERT INTO users (username, password, rol) VALUES ('$username', '$encrypted', 0)";
        $insert = $db->query($q);
        if ($insert) {
            return true;
        } else {
            return false;
        }

    }

    public static function login($username, $password, $avatar)
    {
        $db = Connection::connect();
        $encrypted = md5($password);
        $q = "SELECT * FROM users WHERE username = '$username' AND password = '$encrypted'";
        $search = $db->query($q);
        if ($row = $search->fetch_assoc()) {
            return new User($row['id'], $row['username'], $row['password'], $row['rol']);
        } else {
            return false;
        }
    }

    public static function getUserById($id)
    {
        $db = Connection::connect();
        $id = intval($id);
        $q = "SELECT * FROM users WHERE id = $id";
        $search = $db->query($q);

        if ($row = $search->fetch_assoc()) {
            return new User($row['id'], $row['username'], $row['password'], $row['rol'], $row['avatar'] ?? null);
        } else {
            return false;
        }
    }
    public static function updateAvatar($userId, $relativePath)
{
    $db = Connection::connect();
    $userId = intval($userId);
    $relativePath = $db->real_escape_string($relativePath);
    $q = "UPDATE users SET avatar = '$relativePath' WHERE id = $userId";
    return $db->query($q) ? true : false;
}

}
