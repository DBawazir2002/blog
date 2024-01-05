<?php

include('posts.class.php');

class PostsContr extends Posts{
    private $id;

    public function __construct()
    {
        
    }
    
    public function displayPosts(){
        $result = $this->displayAllPosts();
        return $result;
    }

    public function displaySpecificPost($id){
        $result = $this->displayPost($id);
        return $result;
    }
    
    public function displayPostsforCategory($categoryName){
        $result = $this->showPostsWithCategory($categoryName);
        return $result;
    }

    public function displayLastsPosts(){
        $result = $this->showLastsPosts();
        return $result;
    }

    public function deleteSpecificPost($id){
        $result = $this->deletePost($id);
        return $result;
    }

    public function displayCategorieS(){
        $result = $this->shwoCategorieS();
        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}