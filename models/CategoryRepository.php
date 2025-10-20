<?php
<<<<<<< HEAD


class CategoryRepository{
    public static function getCategories(){
        $db = Connection::connect();
        $q = "SELECT * FROM categories";
        $search = $db->query($q);
    }

    public static function getCategoryById($id){
        $db = Connection::connect();
        $id = intval($id);
        $q = "SELECT * FROM categories WHERE id = $id";
        $search = $db->query($q);
        if ($row = $search->fetch_assoc()) {
            return new Category($row['id'], $row['name'], $row['description']);
        } else {
            return false;
        }
    }


=======
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
        $db->query($q);
        $db->close();
    }

    public static function deleteCategory($id)
    {
        $db = Connection::connect();
        $q = "DELETE FROM categories WHERE id = $id";
        $db->query($q);
        $db->close();
    }
>>>>>>> 155e6e0c90007fe665c6f599d65d410995325e82
}
