<?php

class PublicController{

    public function home(){
        require_once('./views/public/home.php');
    }
    public function Tournois(){
        require_once('./views/public/tournois.php');
    }
    public function Success(){
        Auth_ClientController::isLogged();
        require_once('./views/public/successPage.php');
    }
}