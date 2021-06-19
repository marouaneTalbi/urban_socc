<?php

class PublicClientController{

    private $modelC;
    private $admC;
    private $admM;
    private $admR;
    private $pubC;

    public function __construct()
    {
        $this->modelC = new AdminClientModel();
        $this->admC = new AdminClientModel();
        $this->admM = new AdminMatchModel();
        $this->admR = new AdminReservationModel();
        $this->pubC = new PublicClientModel();
    }  

public function Inscription_client(){

    if(isset($_POST['submit'])){
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
                header('location:index.php?action=login_client');
            }
        }
    }
    require_once('./views/public/clientAdmin/inscription_connexion.php');
}

public function login_client(){
    if(isset($_POST['soumis'])){
        if(strlen($_POST['pass']) >= 4 && !empty($_POST['loginEmail'])){
            $loginEmail = trim(htmlentities(addslashes($_POST['loginEmail'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
            $log_u = $this->admC->signInClient($loginEmail, $pass);
                if(!empty($log_u)){
                        session_start();
                        $_SESSION['Auth_client'] = $log_u;
                        var_dump($_SESSION);
                        header('location:index.php?action=client_reservation');
                }else{
                    $error = "Votre login/email ou/et mot de passe ne corespondent pas"; 
                }
        }else{
            $error = "Entrée les données valides"; 
        }
    }
    require_once('./views/public/clientAdmin/login_client.php');
}

public function Client_Reservation(){
    Auth_ClientController::isLogged();
    $matchs = $this->admM->getMatchs();
    $clients = $this->admC->getClients();
    require_once('./views/public/clientAdmin/client_reservation.php');
}

public function MesRes(){
    Auth_ClientController::isLogged();
        $id=$_SESSION['Auth_client']->id;
        $client  =new Reservation();
        $client->getClient()->setId($id);
        $allR = $this->pubC->recupResByClient($client);
    require_once('./views/public/clientAdmin/MesReservation.php');
}

}