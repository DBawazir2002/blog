<?php
include('connection.php');
class Categories extends Dbh
{
    protected function setCategory($CatName)
    {
        $stmt = $this->connect()->prepare("INSERT INTO `categories` (`id`, `categoryName`, `categoryDate`) VALUES (NULL, '$CatName', current_timestamp());");
        $stmt->execute();
        return true;
    }

    protected function deleteCategory($id){
        $stmt = $this->connect()->prepare("DELETE FROM `categories` WHERE `categories`.`id` = '$id'");
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    protected function shwoCategories(){
        $stmt = $this->connect()->prepare("SELECT * FROM categories ORDER BY id DESC");
        $stmt->execute();
        return $stmt;
    }
}
