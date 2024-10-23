<?php
require_once('DAL.class.php');

class Blog extends DAL
{
    function getAllBlog()
    {
        $sql = "SELECT * FROM blog";
        return $this->getdata($sql);
    }
}
