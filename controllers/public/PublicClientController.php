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


    //echo'123';
    
    require_once('./views/public/clientAdmin/inscription_connexion.php');

}

public function test(){

    echo'123';
    require_once('./views/public/clientAdmin/inscription_connexion.php');

}

public function login_client(){


    if(isset($_POST['soumis'])){
        var_dump($_POST);
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


    if(isset ($_POST['submit'])){
  
        if(isset($_POST['id_match']) && isset($_POST['date'])){

            $id_match = trim(htmlentities(addslashes($_POST['id_match'])));
            $id_client = trim(htmlentities(addslashes($_SESSION['Auth_client']->id)));
            $date = trim(htmlentities(addslashes($_POST['date'])));
            $heure = trim(htmlentities(addslashes($_POST['heure'])));
            $dure =trim(htmlentities(addslashes($_POST['dure'])));

        $res = new Reservation();

            $res->getClient()->setId($id_client);
            $res->getMatch()->setId_match($id_match);
            $res->setDate($date);
            $res->setHeure($heure);
            $res->setDure($dure);
  
           var_dump($res);

        $oui = $this->admR->insertRes($res);

            if($oui){
                header('location:index.php?action=client_mesRes');
            }
        }
    }
    $heures=[
        '9h00','9h30','10h00','10h30','11h00','11h30','12h00','12h30',
        '13h00','13h30','14h00','14h30','15h00','15h30','16h00','16h30',
        '17h00','17h30','18h00','18h30','19h00','19h30','20h00','20h30',
        '21h00','21h30'];

        $heruesRes = $this->admR->getReservation();

  


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