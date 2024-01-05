<?php
include("login.class.php");
class LoginContr extends Login {
    private $email;
    private $password;

    public function __construct() {
    }

    public function loginUser($email ,$password) {
        $result = null;
        if($this->emptyInput($email ,$password) == false) 
        {
            $result = "<div class='alert alert-danger'>" . "الرجاء إدخال البريد الإلكتروني وكلمة السر" . "</div>";
            return $result;
        }
        $this->setEmail($email);
        $this->setPassword($password);
        $result =  $this->getUser($this->email, $this->password);
        return $result;
    }

    private function emptyInput($email ,$password) {
        $result = false;
        if (empty($email) || empty($password))
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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }
}