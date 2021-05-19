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
  
    public function ModiRes(){
        AuthController::isLogged();
        
        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            
            $id = $_GET['id'];
            
            $res = new Reservation();
            $res->setId_res($id);
            $editRes = $this->admRes->recupRes($res);
            $Matchs = $this->admM->getMatchs();
            
           if(isset($_POST['soumis'])){

            var_dump($_POST);
               
               $id_client = trim(htmlentities(addslashes($_POST['id_client'])));
               $id_match = trim(htmlentities(addslashes($_POST['id_match'])));
               $date_debut = trim(htmlentities(addslashes($_POST['date_debut'])));
               $date_fin = trim(htmlentities(addslashes($_POST['date_fin'])));
               
               $editRes->getMatch()->setId_match($id_match);
               $editRes->getClient()->setId($id_client);
               $editRes->setStart($date_debut);
               $editRes->setEnd($date_fin);
           
               
                $ok = $this->admRes->updateReservation($editRes); 
      
               header('location:index.php?action=list_res');
                
           } 
            require_once('./views/admin/reservation/adminModifReservation.php');
        }
    }
    public function ajoutRes(){

        // AuthController::isLogged();
  
        //   if(isset ($_POST['submit'])){
  
        //       if(isset($_POST['id_match']) && isset($_POST['id_client'])&& isset($_POST['date'])){
  
        //           $id_match = trim(htmlentities(addslashes($_POST['id_match'])));
        //           $id_client = trim(htmlentities(addslashes($_POST['id_client'])));
        //           $date_debut = trim(htmlentities(addslashes($_POST['date_debut'])));
        //           $date_fin = trim(htmlentities(addslashes($_POST['date_fin'])));

  
        //       $res = new Reservation();
  
        //           $res->getClient()->setId($id_client);
        //           $res->getMatch()->setId_match($id_match);
        //           $res->setStart($date_fin);
        //           $res->setEnd($date_fin);

        
        //          var_dump($res);

    
        //       $oui = $this->admRes->insertRes($res);

        //         //   if($oui){
        //         //       header('location:index.php?action=list_user');
        //         //   }
        //       }
        //   }
                

                
        
                $matchs = $this->admM->getMatchs();
                $clients = $this->admC->getClients();
        //         $reservations = $this->admRes->getReservationJson();

 
              require_once('./views/admin/reservation/adminAddReservation.php');
      }




      public function fullCallendar(){

        require_once('./assets/js/fullcal.php');

      }





}