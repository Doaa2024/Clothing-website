<?php
require_once("../class/faq.class.php");
$faq = new FAQ();
if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $faqs = $faq->getfaq($title);
    $faq->insertfaq($title, $description);
    $result = $faqs;
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'Title already exists'
        );
    } else {

        $response = array(
            'status' => 'success',
            'message' => 'FAQ added successfully'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
