<?php 
require_once('DAL.class.php');

 class Categories extends DAL{
function getAllCategories(){
    $sql= "SELECT * FROM categories";
    return $this->getdata($sql);
}
function insertCategory($category){
    $sql= "INSERT INTO categories (categories_name) VALUES ('$category')";
    return $this->execute($sql);
}
function getCategory($category){
    $sql= "SELECT * FROM categories WHERE categories_name='$category'";
    return $this->getdata($sql);
}
function deleteCategory($id){
    $sql= "DELETE FROM categories where categories_id=$id";
    return $this->execute($sql);
}
function updateCategory($id, $newName) {
    $sql = "UPDATE categories SET categories_name='$newName' WHERE categories_id=$id";
    return $this->execute($sql);
}

}
?>