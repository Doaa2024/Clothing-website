<?php
require_once("../class/faq.class.php");
$faq = new FAQ();
if ($_POST) {
    $id = $_POST['id'];
    $faqs = $faq->deleteFAQ($id);
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
