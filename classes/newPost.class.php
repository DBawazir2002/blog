<?php
include('connection.php');
class NewPost extends Dbh{
    protected function setNewPost($pTitle, $pAuthor, $pCat, $pContent, $imageName){
        $stmt = $this->connect()->prepare("INSERT INTO `posts` (`id`, `postTitle`, `postAuthor`, `postCat`, `postImage`, `postContent`, `postDate`) VALUES (NULL, '$pTitle', '$pAuthor', '$pCat', '$imageName', '$pContent', current_timestamp());");
        $stmt->execute();
        return true;
    }
    protected function shwoCategorieS(){
        $stmt = $this->connect()->prepare("SELECT * FROM categories ORDER BY id DESC");
        $stmt->execute();
        return $stmt;
    }
}