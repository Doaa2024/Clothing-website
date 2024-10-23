<?php
require_once('DAL.class.php');

class Blog extends DAL
{

    function getAllBlog()
    {
        $sql = "SELECT * FROM blog";
        return $this->getdata($sql);
    }
    function insertblog($title, $description, $type)
    {
        $sql = "INSERT INTO blog (title, description, type) 
            VALUES ('$title', '$description', '$type')";
        return $this->execute($sql);
    }
    public function getblog($title)
    {
        $sql = "select * from blog where title='$title'";
        return $this->getdata($sql);
    }
    function deleteBlog($id)
    {
        $sql = "DELETE FROM blog where blog_id='$id'";
        return $this->execute($sql);
    }
    function updateBlog($id, $title, $description, $type)
    {
        $sql = "UPDATE blog SET 
        title='$title', 
        description='$description',  
        type='$type'
    WHERE blog_id='$id'";

        return $this->execute($sql);
    }

    public function updateimage($id, $images)
    {
        $sql = "Update blog SET 
        image='$images' WHERE blog_id='$id'";
        return $this->execute($sql);
    }
    public function getBlogs($id, $title, $description, $type)
    {
        $sql = "select * from blog where title='$title' and description='$description' and blog_id='$id' and type='$type'";
        return $this->getdata($sql);
    }
}
