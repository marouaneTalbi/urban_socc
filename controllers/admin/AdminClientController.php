<?php


class AdminClientController{

    private $admC;
    private $admM;

    public function __construct()
    {
        $this->admC = new AdminClientModel();
        $this->admM = new AdminMatchModel();
    }


    
    public function listClients(){
      AuthController::isLogged();


        $allC = $this->admC->getClients();
        require_once('./views/admin/client/adminListClient.php');

    }


    public function ajoutClient(){

      AuthController::isLogged();


        if(isset ($_POST['submit'])){

            if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) && strlen($_POST['pass']) >= 4){

                $firstname = trim(htmlentities(addslashes($_POST['firstname'])));
                $name = trim(htmlentities(addslashes($_POST['name'])));
                $login = trim(htmlentities(addslashes($_POST['login'])));
                $email = trim(htmlentities(addslashes($_POST['email'])));
                $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
                $phone = (trim(htmlentities(addslashes($_POST['phone']))));
                $adresse = (trim(htmlentities(addslashes($_POST['adresse']))));

            $client = new Client();

                $client->setFirstname($firstname);
                $client->setName($name);
                $client->setLogin($login);
                $client->setEmail($email);
                $client->setPass($pass);
                $client->setPhone($phone);
                $client->setAdresse($adresse);

            $oui = $this->admC->insertClient($client);
                if($oui){
                    header('location:index.php?action=list_client');
                }
            }
        }

        $allM= $this->admM->getMatchs();
        require_once('./views/admin/client/adminAddClient.php');
    }

    public function ModifClient(){
        AuthController::isLogged();

        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            
            $id = $_GET['id'];
            $modifU = new Client();
            $modifU->setId($id);
            $editUs = $this->admC->recupClient($modifU);
            
         if(isset($_POST['soumis']) && !empty($_POST['login']) && !empty($_POST['pass'])){
               
               $firstname = trim(htmlentities(addslashes($_POST['firstname'])));
               $name = trim(htmlentities(addslashes($_POST['name'])));
               $login = trim(htmlentities(addslashes($_POST['login'])));
               $email = trim(htmlentities(addslashes($_POST['email'])));
               $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
               $phone = trim(htmlentities(addslashes($_POST['phone'])));
               $adresse = trim(htmlentities(addslashes($_POST['adresse'])));

               $editUs->setFirstname($firstname);
               $editUs->setname($name);
               $editUs->setLogin($login);
               $editUs->setEmail($email);
               $editUs->setPass($pass);
               $editUs->setPhone($phone);
               $editUs->setAdresse($adresse);
               
               $ok = $this->admC->updateClient($editUs); 
      
                header('location:index.php?action=list_client');
                
         }


            require_once('./views/admin/client/adminModifClient.php');
        }
    }

    public function suppClient(){

        AuthController::isLogged();
  
  
          if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
              $id = trim($_GET['id']);
  
              $nbLine = $this->admC->deleteClient($id);
  
              if($nbLine > 0){
                      header('location:index.php?action=list_client');
                  }
          }
      }



}