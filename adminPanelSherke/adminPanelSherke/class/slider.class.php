<?php
require_once('DAL.class.php');

class Slider extends DAL
{
    function getAllSlider()
    {
        $sql = "SELECT * FROM slide_show";
        return $this->getdata($sql);
    }

    public function updateimage($id, $images)
    {
        $sql = "Update slide_show SET 
        image='$images' WHERE slide_id='$id'";
        return $this->execute($sql);
    }
    function updateSlider($id, $title, $description)
    {
        $sql = "UPDATE slide_show SET 
        title='$title', 
        description='$description' 
   
    WHERE slide_id=$id";

        return $this->execute($sql);
    }
    function getSlider($id, $title, $description)
    {
        $sql = "SELECT * FROM slide_show WHERE slide_id='$id' and title='$title' and description='$description'";
        return $this->getdata($sql);
    }
}
