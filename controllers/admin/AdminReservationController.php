<?php

class AdminReservationController{

    private $admRes;
    private $admM;
    private $admC;


    public function __construct()
    {
        $this->admRes = new AdminReservationModel();
        $this->admM = new AdminMatchModel();
        $this->admC = new AdminClientModel();
        
    }

    public function listReservations(){
        AuthController::isLogged();
          $allR = $this->admRes->getReservation();
          require_once('./views/admin/reservation/adminReservationList.php');
  
      }
      
    public function suppRes(){
        AuthController::isLogged();
            if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
                $id = trim($_GET['id']);
                $nbLine = $this->admRes->deleteRes($id);
                if($nbLine > 0){
                        header('location:index.php?action=list_res');
                }else{
                    echo " ERROR";
                }
            }
    }
  
    public function ajoutRes(){
        AuthController::isLogged();

                $matchs = $this->admM->getMatchs();
                $clients = $this->admC->getClients();
              require_once('./views/admin/reservation/adminAddReservation.php');
      }

    public function fullCallendar(){
    require_once('./assets/js/fullcal.php');
    }





}