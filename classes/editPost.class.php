<?php

include('connection.php');
class EditPosts extends Dbh{

    protected function updatePost($id,$pTitle, $pAuthor, $pCat, $pContent, $imageName){
        $stmt = $this->connect()->prepare("UPDATE `posts` SET `postTitle` = '$pTitle', `postAuthor` = '$pAuthor', `postCat` = '$pCat', `postImage` = '$imageName', `postContent` = '$pContent' WHERE `posts`.`id` = '$id';");
        $result = $stmt->execute();
        return $result;
    }

    protected function shwoCategories(){
        $stmt = $this->connect()->prepare("SELECT * FROM categories ORDER BY id DESC");
        $stmt->execute();
        return $stmt;
    }

    protected function getSpecificPost($id){
        $stmt = $this->connect()->prepare("SELECT * FROM `posts` WHERE id = '$id'");
        $stmt->execute();
        return $stmt;
    }
    
}