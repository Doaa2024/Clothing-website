<?php
require_once("../class/faq.class.php");
$faq = new FAQ();
if ($_POST) {
    $id = $_POST['idfield'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $oldtitle = $_POST['oldtitle'];
    $olddescription = $_POST['olddescription'];
    $existingfaq = $faq->getfaqs($id, $title, $description);
    if (empty($existingfaq)) {
        $affected_rows = $faq->updateFAQ($id, $title, $description);

        if ($affected_rows === 0) {
            $response = array(
                'status' => 'success',
                'message' => 'FAQ updated successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Something went wrong'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => ' This FAQ already exists'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
