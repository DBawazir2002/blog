<?php

class EditPostContr extends EditPosts{
    private $pTitle;
    private $pCat;
    private $pContent;
    private $pAuthor;
    private $imageName;
    private $id;

    public function __construct()
    {
        // $this->pTitle = $pTitle;
        // $this->pAuthor = $pAuthor;
        // $this->pCat = $pCat;
        // $this->pContent = $pContent;
        // $this->imageName = $imageName;
        // $this->id = $id;
    }

    public function editPost($id, $pTitle, $pAuthor, $pCat, $pContent, $imageName,$imageNameWithRandom){
        $result = null;
        if($this->emptyInput($pTitle, $pAuthor, $pCat, $pContent) == false){
            $result = "<div class='alert alert-danger'>" . "الرجاء ملء الحقول أدناة" . "</div>";
            return $result;
        }

        if($this->checkSizeContent($pContent) == false){
            $result = "<div class='alert alert-danger'>" . "محتوي المنشور كبير جداً" . "</div>";
            return $result;
        }
        
        if($this->checkImageIsThere($imageName) == false){
            $result = "<div class = 'alert alert-danger'>"."الرجاء ارفاق صورة للمنشور"."</div>";
            return $result;
        }
        $result = $this->setImageName($imageNameWithRandom);
        $result = $this->setPAuthor($pAuthor);
        $result = $this->setPCat($pCat);
        $result = $this->setPContent($pContent);
        $result = $this->setPTitle($pTitle);
        $result = $this->setId($id);
        $result = $this->updatePost($this->id,$this->pTitle, $this->pAuthor, $this->pCat, $this->pContent, $this->imageName);
        return $result;
    }

    public function displayCategorieS(){
        $result = $this->shwoCategorieS();
        return $result;
    }

    public function displaySpecificPost($id){
        $result = $this->getSpecificPost($id);
        return $result;
    }

    private function emptyInput($pTitle, $pAuthor, $pCat, $pContent){
    if (empty($pTitle) || empty($pAuthor) || empty($pCat) || empty($pContent))
     {
        return false;
     }
    else 
     {
        return true;
     }
    }

    private function checkImageIsThere($imageName){
        if(empty($imageName)){
            $result = false;
    }
    else 
    {
        $result = true;
    }
    return $result;
    }
    private function checkSizeContent($pContent){
        if(strlen($pContent) < 10000){
            return true;
        }
        return false;
    }

    


    /**
     * Get the value of pTitle
     */ 
    public function getPTitle()
    {
        return $this->pTitle;
    }

    /**
     * Set the value of pTitle
     *
     * @return  self
     */ 
    public function setPTitle($pTitle)
    {
        $this->pTitle = $pTitle;

        return $this;
    }

    /**
     * Get the value of pCat
     */ 
    public function getPCat()
    {
        return $this->pCat;
    }

    /**
     * Set the value of pCat
     *
     * @return  self
     */ 
    public function setPCat($pCat)
    {
        $this->pCat = $pCat;

        return $this;
    }

    /**
     * Get the value of pContent
     */ 
    public function getPContent()
    {
        return $this->pContent;
    }

    /**
     * Set the value of pContent
     *
     * @return  self
     */ 
    public function setPContent($pContent)
    {
        $this->pContent = $pContent;

        return $this;
    }

    /**
     * Get the value of pAuthor
     */ 
    public function getPAuthor()
    {
        return $this->pAuthor;
    }

    /**
     * Set the value of pAuthor
     *
     * @return  self
     */ 
    public function setPAuthor($pAuthor)
    {
        $this->pAuthor = $pAuthor;

        return $this;
    }

    /**
     * Get the value of imageName
     */ 
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set the value of imageName
     *
     * @return  self
     */ 
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
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