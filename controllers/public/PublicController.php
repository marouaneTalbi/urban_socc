<?php

class PublicController{

    private $modelC;
    private $admC;
    private $admM;
    private $admR;




    public function __construct()
    {
        $this->modelC = new AdminClientModel();
        $this->admC = new AdminClientModel();
        $this->admM = new AdminMatchModel();
        $this->admR = new AdminReservationModel();
        
    }

public function home(){
    require_once('./views/public/home.php');
}

//___________________________________________________________________________________________//



}