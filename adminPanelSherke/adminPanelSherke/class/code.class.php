<?php
require_once('DAL.class.php');

class Code extends DAL
{
    function getAllCode()
    {
        $sql = "SELECT * FROM couponcode";
        return $this->getdata($sql);
    }



    function getCodeById($id, $name, $percentage, $limits, $date)
    {
        // Properly escape inputs to avoid SQL injection


        $sql = "SELECT * FROM couponcode WHERE code_id='$id' and code_name='$name' and percentage='$percentage' and limits='$limits' and expiry_date='$date'";
        return $this->getdata($sql);
    }

    function deleteCode($id)
    {
        // Properly escape inputs to avoid SQL injection
        $id = intval($id);

        $sql = "DELETE FROM couponcode WHERE code_id=$id";
        return $this->execute($sql);
    }

    public function getCode($name)
    {
        // Properly escape inputs to avoid SQL injection
        $name = addslashes($name);

        $sql = "SELECT * FROM couponcode WHERE code_name='$name'";
        return $this->getdata($sql);
    }

    function insertCode($name, $percentage, $limits, $date)
    {
        // Properly escape inputs to avoid SQL injection

        $sql = "INSERT INTO couponcode (code_name, percentage,limits,expiry_date) 
                VALUES ('$name', '$percentage','$limits','$date')";
        return $this->execute($sql);
    }
    public function getCodes($id, $name)
    {
        $sql = "select * from couponcode where code_name='$name' and code_id!='$id'";
        return $this->getdata($sql);
    }
    function updateCode($id, $name, $percentage, $limits, $date)
    {

        $sql = "UPDATE couponcode SET 
                code_name='$name', 
                percentage='$percentage',
                  limits='$limits' ,
                expiry_date='$date'  
                WHERE code_id=$id";
        return $this->execute($sql);
    }
}
