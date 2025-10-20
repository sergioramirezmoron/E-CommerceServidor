<?php


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


}
