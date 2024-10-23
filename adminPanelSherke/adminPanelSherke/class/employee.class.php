<?php
require_once('DAL.class.php');

class Employee extends DAL
{
    function getAllEmployee()
    {
        $sql = "SELECT * FROM employee";
        return $this->getdata($sql);
    }



    function getEmployeeById($id, $name, $email, $type)
    {
        // Properly escape inputs to avoid SQL injection


        $sql = "SELECT * FROM employee WHERE id='$id' and username='$name' and email='$email' and user_type='$type' ";
        return $this->getdata($sql);
    }
    function getSuperById($id, $name, $email)
    {
        // Properly escape inputs to avoid SQL injection


        $sql = "SELECT * FROM employee WHERE id='$id' and username='$name' and email='$email'";
        return $this->getdata($sql);
    }

    function deleteEmployee($id)
    {
        // Properly escape inputs to avoid SQL injection
        $id = intval($id);

        $sql = "DELETE FROM employee WHERE id=$id";
        return $this->execute($sql);
    }



    function insertEmployee($name, $email, $password, $type)
    {
        // Properly escape inputs to avoid SQL injection

        $sql = "INSERT INTO employee (username, email,password,user_type) 
                VALUES ('$name', '$email','$password','$type')";
        return $this->execute($sql);
    }
    public function getEmployee($id, $name)
    {
        $sql = "select * from employee where username='$name' and id!='$id'";
        return $this->getdata($sql);
    }
    public function getEmployeeByname($name)
    {
        $sql = "select * from employee where username='$name'";
        return $this->getdata($sql);
    }
    function updateEmployee($id, $name, $email, $type)
    {

        $sql = "UPDATE employee SET 
                username='$name', 
                email='$email',
                  user_type='$type' 
                WHERE id=$id";
        return $this->execute($sql);
    }
    function updateSuper($id, $name, $email)
    {

        $sql = "UPDATE employee SET 
                username='$name', 
                email='$email' 
                WHERE id=$id";
        return $this->execute($sql);
    }
    function updatePass($id, $password)
    {

        $sql = "UPDATE employee SET 
                password='$password'
             
                WHERE id=$id";
        return $this->execute($sql);
    }
}
