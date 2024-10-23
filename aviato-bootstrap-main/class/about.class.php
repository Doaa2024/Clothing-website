<?php
require_once('DAL.class.php');

class About extends DAL
{
    function getAllAbout()
    {
        $sql = "SELECT * FROM about";
        return $this->getdata($sql);
    }
}
