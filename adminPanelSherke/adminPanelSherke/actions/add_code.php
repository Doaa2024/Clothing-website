<?php
require_once("../class/code.class.php");
$code = new Code();
if ($_POST) {
    $name = $_POST['name'];
    $percentage = $_POST['percentage'];
    $limits = $_POST['limits'];
    $date = $_POST['date'];
    $codes = $code->getCode($name);
    $result = $codes;
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'Code already exists'
        );
    } else {
        $code->insertCode($name, $percentage, $limits, $date);
        $response = array(
            'status' => 'success',
            'message' => 'Coupon Code added successfully'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
