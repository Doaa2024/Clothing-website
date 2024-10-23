<?php
require_once('DAL.class.php');

class FAQ extends DAL
{
    function getAllFAQ()
    {
        $sql = "SELECT * FROM faq";
        return $this->getdata($sql);
    }



    function getFAQById($id)
    {
        // Properly escape inputs to avoid SQL injection
        $id = intval($id);

        $sql = "SELECT * FROM faq WHERE faq_id=$id";
        return $this->getdata($sql);
    }

    function deleteFAQ($id)
    {
        // Properly escape inputs to avoid SQL injection
        $id = intval($id);

        $sql = "DELETE FROM faq WHERE faq_id=$id";
        return $this->execute($sql);
    }

    public function getFAQ($title)
    {
        // Properly escape inputs to avoid SQL injection
        $title = addslashes($title);

        $sql = "SELECT * FROM faq WHERE title='$title'";
        return $this->getdata($sql);
    }

    function insertFAQ($title, $description)
    {
        // Properly escape inputs to avoid SQL injection
        $title = addslashes($title);
        $description = addslashes($description);

        $sql = "INSERT INTO faq (title, description) 
                VALUES ('$title', '$description')";
        return $this->execute($sql);
    }
    public function getfaqs($id, $title, $description)
    {
        $sql = "select * from faq where title='$title' and description='$description' and faq_id='$id'";
        return $this->getdata($sql);
    }
    function updateFAQ($id, $title, $description)
    {

        $sql = "UPDATE faq SET 
                title='$title', 
                description='$description' 
                WHERE faq_id=$id";
        return $this->execute($sql);
    }
}
