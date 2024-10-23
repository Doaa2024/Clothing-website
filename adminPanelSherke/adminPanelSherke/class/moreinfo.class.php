<?php
require_once('DAL.class.php');

class MoreInfo extends DAL
{


    function getAllInfo()
    {
        $sql = "SELECT * FROM moreinfo";
        return $this->getdata($sql);
    }
    function updateInfo($name, $number, $facebook, $instagram, $twitter, $pinterest, $location, $email, $shipping)
    {
        $sql = "UPDATE moreinfo SET 
        number='$number', 
        name='$name' ,
        facebook='$facebook', 
        instagram='$instagram' ,
        twitter='$twitter', 
         location='$location', 
          email='$email', 
        pinterest='$pinterest',
        shipping='$shipping'";
        return $this->execute($sql);
    }
    function getInfo($name, $number, $facebook, $instagram, $twitter, $pinterest, $location, $email, $shipping)
    {
        $sql = "SELECT * FROM moreinfo WHERE name='$name' and number='$number' and facebook='$facebook' and instagram='$instagram' and twitter='$twitter' and pinterest='$pinterest' and email='$email' and location='$location' and shipping='$shipping'";
        return $this->getdata($sql);
    }
}
