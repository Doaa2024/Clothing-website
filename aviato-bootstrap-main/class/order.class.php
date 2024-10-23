<?php
require_once('DAL.class.php');

class Order extends DAL
{
    function insertOrder($customer_id, $total_price, $phone, $address, $zipcode, $city)
    {
        $sql = "INSERT INTO orders (CustomerID,  TotalAmount, PhoneNumber, Address, ZipCode, City) 
            VALUES ('$customer_id', '$total_price', '$phone',  '$address','$zipcode','$city')";
        return $this->execute($sql);
    }
    function insertOrderItems($orderID, $productID, $size, $quantity, $price)
    {
        $sql = "INSERT INTO orderitems (OrderID,  ProductID, Size, Quantity, Price) 
            VALUES ('$orderID', '$productID', '$size',  '$quantity','$price')";
        return $this->execute($sql);
    }
    function getCustomerID($username)
    {
        $sql = "SELECT * FROM Customers WHERE UserName='$username'";
        return $this->getdata($sql);
    }
    function getAllOrders($id)
    {
        $sql = "SELECT * From orders where CustomerID='$id'";
        return $this->getdata($sql);
    }
    function getAllOrderItems($orderID)
    {
        $sql = "SELECT * From orderItems where OrderID='$orderID'";
        return $this->getdata($sql);
    }
    function getQuantity($id)
    {
        $sql = "SELECT quantity FROM product WHERE product_id='$id'";
        return $this->getdata($sql);
    }
    function setQuantity($id, $quantity)
    {
        $sql = "UPDATE product SET quantity = '$quantity' WHERE product_id='$id'";
        return $this->execute($sql);
    }
    function setLimits($id, $limits)
    {
        $sql = "UPDATE couponcode SET limits = '$limits' WHERE code_id ='$id'";
        return $this->execute($sql);
    }
    function getUsed($id)
    {
        $sql = "    SELECT used_by FROM couponcode WHERE code_id = '$id'";
        return $this->getdata($sql);
    }
    function setUsed($id, $used_by)
    {
        $sql = "UPDATE couponcode SET used_by = '$used_by' WHERE code_id ='$id'";
        return $this->execute($sql);
    }
}
