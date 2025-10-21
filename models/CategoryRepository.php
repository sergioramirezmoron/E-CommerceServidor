<?php

class CategoryRepository
{
    public static function getAllCategories()
    {
        $db = Connection::connect();
        $q = "SELECT * FROM categories";
        $result = $db->query($q);
        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
        $db->close();
        return $categories;
    }

    public static function getCategoryById($id)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM categories WHERE id = $id";
        $result = $db->query($q);
        $category = null;
        if ($row = $result->fetch_assoc()) {
            $category = $row;
        }
        $db->close();
        return $category;
    }

    public static function addCategory($name)
    {
        $db = Connection::connect();
        $q = "INSERT INTO categories VALUES (null, '$name')";
        $result = $db->query($q);
        if ($result) {
            $db->insert_id;
        } else {
            false;
        }
        $db->close();
    }

    public static function deleteCategory($id)
    {
        $db = Connection::connect();
        $q = "DELETE FROM categories WHERE id = $id";
        $db->query($q);
        $db->close();
    }
}
