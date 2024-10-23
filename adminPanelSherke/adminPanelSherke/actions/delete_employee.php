<?php
require_once("../class/employee.class.php");
$employee = new Employee();
if ($_POST) {
    $id = $_POST['id'];
    $emloyees = $employee->deleteEmployee($id);
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
