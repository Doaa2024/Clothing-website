<?php
require_once('DAL.class.php');

class About extends DAL
{
    function getAllAbout()
    {
        $sql = "SELECT * FROM about";
        return $this->getdata($sql);
    }

    public function updateimage($images)
    {
        $sql = "Update about SET 
        image='$images'";
        return $this->execute($sql);
    }
    function updateAbout($description)
    {
        $sql = "UPDATE about SET  
        description='$description' 
";

        return $this->execute($sql);
    }
}
