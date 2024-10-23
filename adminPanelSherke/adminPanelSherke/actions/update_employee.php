<?php
require_once("../class/employee.class.php");
$employee = new Employee();

if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $password = $_POST['password'];

    $existingEmployee = $employee->getEmployee($id, $name);

    if (empty($existingEmployee)) {
        $noUpdate = $employee->getEmployeeById($id, $name, $email, $type);

        if (empty($noUpdate) || !empty($password)) {
            $affected_rows = $employee->updateEmployee($id, $name, $email, $type);

            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $passwordUpdate = $employee->updatePass($id, $hashedPassword);
                if ($passwordUpdate === false) {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Failed to update password'
                    );
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit;
                }
            }

            if ($affected_rows === 0 && (empty($password) || $passwordUpdate !== false)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Employee updated successfully'
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
                'message' => 'No changes have been made!'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'This Employee already exists'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
