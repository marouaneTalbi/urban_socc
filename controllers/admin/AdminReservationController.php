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
               $date = trim(htmlentities(addslashes($_POST['date'])));
               $heure = trim(htmlentities(addslashes($_POST['heure'])));
               $dure = trim(htmlentities(addslashes($_POST['dure'])));
               
               $editRes->getMatch()->setId_match($id_match);
               $editRes->getClient()->setId($id_client);
               $editRes->setDate($date);
               $editRes->setHeure($heure);
               $editRes->setDure($dure);
               
                $ok = $this->admRes->updateReservation($editRes); 
      
               header('location:index.php?action=list_res');
                
           } 
            require_once('./views/admin/reservation/adminModifReservation.php');
        }
    }
    public function ajoutRes(){

        AuthController::isLogged();
  
          if(isset ($_POST['submit'])){
  
              if(isset($_POST['id_match']) && isset($_POST['id_client'])&& isset($_POST['date'])){
  
                  $id_match = trim(htmlentities(addslashes($_POST['id_match'])));
                  $id_client = trim(htmlentities(addslashes($_POST['id_client'])));
                  $date = trim(htmlentities(addslashes($_POST['date'])));
                  $heure = trim(htmlentities(addslashes($_POST['heure'])));
                  $dure =trim(htmlentities(addslashes($_POST['dure'])));

                  echo 
                  '<br>id_client  : '.$id_client .
                  '<br>id_match : '. $id_match .
                  '<br>date : '.$date .
                  '<br>heure : '.$heure .
                  '<br>dure : '. $dure.'<br>';
  
              $res = new Reservation();
  
                  $res->getClient()->setId($id_client);
                  $res->getMatch()->setId_match($id_match);
                  $res->setDate($date);
                  $res->setHeure($heure);
                  $res->setDure($dure);
        
                 var_dump($res);

    
              $oui = $this->admRes->insertRes($res);

                  if($oui){
                      header('location:index.php?action=list_user');
                  }
              }
          }
                $matchs = $this->admM->getMatchs();
                $clients = $this->admC->getClients();
              require_once('./views/admin/reservation/adminAddReservation.php');
      }



}