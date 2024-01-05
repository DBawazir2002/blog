<?php

include('connection.php');
class Posts extends Dbh{
    protected function displayAllPosts(){
        $stmt = $this->connect()->prepare("SELECT * FROM posts ORDER BY id DESC");
        $stmt->execute();
        return $stmt;
    }

    protected function displayPost($id){
        $stmt = $this->connect()->prepare("SELECT * FROM posts WHERE id='$id'");
        $stmt->execute();
        return $stmt;
    }

    protected function showPostsWithCategory($categoryName){
        $stmt = $this->connect()->prepare("SELECT * FROM posts  WHERE postCat='$categoryName' ORDER BY id DESC");
        $stmt->execute();
        return $stmt;
    }

    protected function shwoCategorieS(){
        $stmt = $this->connect()->prepare("SELECT * FROM categories ORDER BY id DESC");
        $stmt->execute();
        return $stmt;
    }

    protected function showLastsPosts(){
        $stmt = $this->connect()->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 5");
        $stmt->execute();
        return $stmt;
    }

    protected function deletePost($id){
        $stmt = $this->connect()->prepare("DELETE FROM `posts` WHERE `posts`.`id` = '$id'");
        $result = $stmt->execute();
        return $result;
    }
    
}