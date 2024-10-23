<?php
require_once("../class/code.class.php");
$code = new Code();
if ($_POST) {
    $id = $_POST['id'];
    $codes = $code->deleteCode($id);
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
