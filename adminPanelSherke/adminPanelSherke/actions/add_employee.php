<?php
require_once("../class/employee.class.php");
$employee = new Employee();
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $storedPasswordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $type = $_POST['type'];
    $emply = $employee->getEmployeeByname($name);
    $result = $emply;
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'User Name already exists'
        );
    } else {
        $employee->insertEmployee($name, $email, $storedPasswordHash, $type);
        $response = array(
            'status' => 'success',
            'message' => 'Employee added successfully'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
