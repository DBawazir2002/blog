<?php
include('connection.php');
class Login extends Dbh {

    protected function getUser($adminEmail, $adminPass) {
        $stmt = $this->connect()->prepare("SELECT * FROM admin WHERE adminEmail='$adminEmail' AND adminPass='$adminPass'");
        $stmt->execute();
        return $stmt;
    }

}