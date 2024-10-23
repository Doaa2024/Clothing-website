<?php
require_once("../class/categories.class.php");
$categories = new Categories();
if ($_POST) {
    $name = $_POST['categories'];
    $category = $categories->getcategory($name);
    $result = $category;
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'The name of category is already exists'
        );
    } else {
        $categories->insertcategory($name);
        $response = array(
            'status' => 'success',
            'message' => 'Category added successfully'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response); // Output the JSON response
}
