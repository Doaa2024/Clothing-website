<?php
 require_once("../class/categories.class.php"); 
$categories = new Categories();
if ($_POST) {
 $id = $_POST['categoryId'];
 $category = $categories->deleteCategory($id);
 $result = $id;
 if ($result) {
 $response = array(
 'status' => 'success',
 'message' => 'Deleted'
 );
 } else {

 $response = array(
 'status' => 'Failed',
 'message' => 'Something Went Wrong'
 );
 }
 header('Content-Type: application/json');
 echo json_encode($response); // Output the JSON response
}

?>