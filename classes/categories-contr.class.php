<?php
include('categories.class.php');
class CategoriesContr extends Categories{
    private $categoryName;


    public function __construct() {
}


public function categories($categoryName){
    if($this->emptyInput() == false) 
    {
        // "echo Empty input!";
        header("location:categories.php?error:emptyinput");
        exit();
        $result = false;
    }
    if($this->categoryName < 100){
        // "echo very tell"
        header("location:categories.php?error:should-category-less-than-100");
        exit();
        $result = false;
    }
    $result = $this->setCategory($categoryName);
    return $result;
}

public function displayCategories(){
    $result = $this->shwoCategories();
    return $result;
}

public function deleteCate($id){
    $result = $this->deleteCategory($id);
    return $result;
}

private function emptyInput() {
    $result=false;
    if (empty($this->categoryName))
    {
        $result = false;
    }
    else 
    {
        $result = true;
    }
    return $result;
}


    /**
     * Get the value of categoryName
     */ 
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set the value of categoryName
     *
     * @return  self
     */ 
    public function setCategoryName($categoryName)
    {

        $this->categoryName = $categoryName;

        return $this;
    }
}