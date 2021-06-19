<?php


require './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AdminCalendarController{


    private $admRes;
    private $admM;
    private $admC;
    private $adminCalendar;


    public function __construct()
    {
        $this->admRes = new AdminReservationModel();
        $this->admM = new AdminMatchModel();
        $this->admC = new AdminClientModel();
        $this->adminCalendar = new AdminCalendarModel();
        
    }


public function SelectCallendarTerrins(){

    if(isset($_POST['id_match'])){

        $id_match = $_POST['id_match'];
        $res = new Reservation();
        $res->getMatch()->setId_match($id_match);
        $result  = $this->adminCalendar->SelectTerrin($res);
    }
}

public function SelectCallendar(){

       $result = $this->adminCalendar->SelectCalendar();
}

 public function InsertCallendar(){
    session_start();

    $id_match = trim(htmlentities(addslashes($_SESSION['pay']['id_match'])));
    $id_client = trim(htmlentities(addslashes($_SESSION['pay']['id_client'])));
    $date_start = trim(htmlentities(addslashes($_SESSION['pay']['start'])));
    $date_fin = trim(htmlentities(addslashes($_SESSION['pay']['end'])));

   $res = new Reservation();

   $res->getClient()->setId($id_client);
   $res->getMatch()->setId_match($id_match);
   $res->setStart($date_start);
   $res->setEnd($date_fin);
   
   $result = $this->adminCalendar->InsertCal($res);
   if($result){
           header('location:index.php?action=success');
       }
 }

public function InsertCallendarAdmin(){

    $id_match = trim(htmlentities(addslashes($_POST['id_match'])));
    $id_client = trim(htmlentities(addslashes($_POST['id_client'])));
    $date_start = trim(htmlentities(addslashes($_POST['start'])));
    $date_fin = trim(htmlentities(addslashes($_POST['end'])));


    $res = new Reservation();
    $res->getClient()->setId($id_client);
    $res->getMatch()->setId_match($id_match);
    $res->setStart($date_start);
    $res->setEnd($date_fin);

   $result = $this->adminCalendar->InsertCal($res);
   if($result){
           header('location:index.php?action=success');
       }
require_once('./views/public/test.php');
}

public function PaymentCal(){

    $id_match = trim(htmlentities(addslashes($_POST['id_match'])));
    $id_client = trim(htmlentities(addslashes($_POST['id_client'])));
    $date_start = trim(htmlentities(addslashes($_POST['start'])));
    $date_fin = trim(htmlentities(addslashes($_POST['end'])));
    $prix = trim(htmlentities(addslashes($_POST['prix'])));
    $email = trim(htmlentities(addslashes($_POST['email'])));
    $name = trim(htmlentities(addslashes($_POST['name'])));
    $firstname = trim(htmlentities(addslashes($_POST['firstname'])));

    \Stripe\Stripe::setApiKey('sk_test_51IM8ZrEwRtoFpDAHRzosyjI15p26BORIEDgbmAyTU6vftlVeTcKt3ncppiL7SPkqlOcKYsH3sdHfo41hvqrgBb4G00hRY1LExZ');
    header('Content-Type: application/json');
    session_start();
    $_SESSION['pay'] = $_POST;

        $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
        'price_data' => [
        'currency' => 'eur',
        'unit_amount' => $prix*100,
        'product_data' => [
        'name' => $firstname. ' '. $name,
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
        'description' => 'votre match commence le :'.$date_start. ', et il fini a : ' .$date_fin ,
        ],
        ],
        'quantity' => 1,
        ]],
        'customer_email'=> $email,
        'mode' => 'payment',
        'success_url' => 'http://localhost/urban_soccer/index.php?action=insert_callendar',
        'cancel_url' => 'http://localhost/php/articles12/index.php?action=cancel',
        ]);

        echo json_encode(['id' => $checkout_session->id]);

}

public function confirmation(){
 session_start();
    
    $email = $_SESSION['pay']['email'];
    $firstname = $_SESSION['pay']['firstname'];
    $name = $_SESSION['pay']['name'];
    $prix = $_SESSION['pay']['prix'];
    $start = $_SESSION['pay']['start'];
    $end = $_SESSION['pay']['end'];
    
    $mail = new PHPMailer(true);
    try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                  
    $mail->SMTPAuth   = true;                                 
    $mail->Username   = 'dwwm94@gmail.com';                 
    $mail->Password   = 'mziyzxforjcwijpo';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;                                    
    
    $mail->setFrom('dwwm94@gmail.com', 'URBAN SOCCER');
    $mail->addAddress($email, 'Mr/Mme');     
    
    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Reservation';
    $mail->Body    = "
    <h2>confirmation de reservation</h2>
    <div>
    Bonjour
    <b>  $firstname $name </b>
    <b>Vous avez effectue une reservation sur notre plateforme.</b>
    <b>Voici les detailles de votre reservation </b>
    <b>Date de debut : $start </b>
    <b>Date de fin : $end </b>
    <b> Prix : $prix €</b>
    <p>nous vous Remercions pour votre Reservation a tres bientot !</p>

    </div>";
    $mail->send();
     echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    require_once('./views/public/success.php');
    }

public function editCal(){
    if(isset($_POST['id_res'])){

         $id = $_POST['id_res'];
            $res = new Reservation();
            $res->setId_res($id);
            $editRes = $this->admRes->recupRes($res);
            $date_debut = trim(htmlentities(addslashes($_POST['start'])));
            $date_fin = trim(htmlentities(addslashes($_POST['end'])));
            $editRes->setStart($date_debut);
            $editRes->setEnd($date_fin);
            $ok = $this->adminCalendar->UpdatetCal($editRes); 
    }
      
}

public function SuppCal(){

    if(isset($_POST['id_res']) && filter_var($_POST['id_res'], FILTER_VALIDATE_INT)){
        $id = trim($_POST['id_res']);
        $ok = $this->adminCalendar->SupprimerCal($id); 
    }
}


}
