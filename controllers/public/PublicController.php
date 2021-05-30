<?php



require './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
public function Success(){
    Auth_ClientController::isLogged();
    require_once('./views/public/successPage.php');
}





public function payment(){


    
    if(isset($_POST) && !empty($_POST['email'])){ 

                \Stripe\Stripe::setApiKey('sk_test_51IM8ZrEwRtoFpDAHRzosyjI15p26BORIEDgbmAyTU6vftlVeTcKt3ncppiL7SPkqlOcKYsH3sdHfo41hvqrgBb4G00hRY1LExZ');

                header('Content-Type: application/json');


                $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                'price_data' => [
                'currency' => 'eur',
                'unit_amount' => $_POST['prix']*100,
                'product_data' => [
                'name' => $_POST['titre']."-".$_POST['auteur'],
                'images' => ["https://i.imgur.com/EHyR2nP.png"],
                'description' => $_POST['description'],
                ],
                ],
                'quantity' => 1,
                ]],
                'customer_email'=> $_POST['email'],
                'mode' => 'payment',
                'success_url' => 'http://localhost/php/articles12/index.php?action=success',
                'cancel_url' => 'http://localhost/php/articles12/index.php?action=cancel',
                ]);

                $_SESSION['pay'] = $_POST;

                echo json_encode(['id' => $checkout_session->id]);

                }        


}



public function confirmation(){
                
$res = new Reservation();
$res->setId_res($_SESSION['pay']['id']);

$email = $_SESSION['pay']['email'];
$titre = $_SESSION['pay']['titre'];
$auteur = $_SESSION['pay']['auteur'];
$prix = $_SESSION['pay']['prix'];

$mail = new PHPMailer(true);

try {

$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'dwwm94@gmail.com';                     //SMTP username
$mail->Password   = 'mziyzxforjcwijpo';                                //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
$mail->setFrom('dwwm94@gmail.com', 'contact eart');
$mail->addAddress($email, 'Mr/Mme');     //Add a recipient


//Content
$mail->isHTML(true);                                  
$mail->Subject = 'Here is the subject';
$mail->Body    = "
<h2>confirmation d'achat</h2>
<div>
<b> Titre : $titre</b>
<b> Auteur : $auteur</b>
<b> Prix : $prix €</b>
<p>nous vous Remercions pour votre achat !</p>
</div>";

$mail->send();
// echo 'Message has been sent';


} catch (Exception $e) {

echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

require_once('./views/public/success.php');

}



//___________________________________________________________________________________________//



}