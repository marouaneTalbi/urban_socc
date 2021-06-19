<?php

session_start();
class Auth_ClientController{

    public static function isLogged(){
        if(!isset($_SESSION['Auth_client'])){
            header('location:index.php?action=login_client');
            exit;
        }
    }

    public static function logout(){
        unset($_SESSION['Auth_client']);
        header('location:index.php?action=login_client');
    }
    
}