<?php
require_once('DAL.class.php');

class User extends DAL
{
    function getAllUsers()
    {
        $sql = "SELECT * From customers";
        return $this->getdata($sql);
    }

    function getAllCustomers()
    {
        $sql = "SELECT * 
        FROM customers
        WHERE CustomerID IN (SELECT CustomerID FROM orders); ";
        return $this->getdata($sql);
    }
}
