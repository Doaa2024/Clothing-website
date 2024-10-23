<?php
require_once("../class/blog.class.php");
$blog = new Blog();
if ($_POST) {
    $id = $_POST['id'];
    $blogs = $blog->deleteBlog($id);
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
