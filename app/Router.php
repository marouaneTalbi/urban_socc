<?php

require_once('./app/autoload.php');

class Router{

    private $ctrM;
    private $ctrU;
    private $ctrC;
    private $ctrP;
    private $ctrPC;
    private $ctrCalendar;



    
    public function __construct()
    {
            $this->ctrM = new AdminMatchController();
            $this->ctrU = new AdminUserController();
            $this->ctrC = new AdminClientController();
            $this->ctrR = new AdminReservationController();
            $this->ctrP = new PublicController();
            $this->ctrPC = new PublicclientController();
            $this->ctrCalendar = new AdminCalendarController();
    }
    public function getPath(){

        if(isset($_GET['action'])){

                    switch($_GET['action']){

                        //________________MATCH_____________________________________

                                case 'list_match':
                                    $this->ctrM->listMatch();
                                    break;
                                case 'delete_match':
                                    $this->ctrM-> suppMatch();
                                    break;
                                case 'add_match':
                                    $this->ctrM-> ajoutMatch();
                                    break;
                                case 'modif_match':
                                    $this->ctrM-> modifMatch();
                                    break;
                        //________________USER_____________________________________
                              
                                case 'list_user':
                                    $this->ctrU->listUsers();
                                    break;
                                case 'delete_user':
                                    $this->ctrU-> suppUser();
                                    break;
                                case 'add_user':
                                    $this->ctrU-> ajoutUser();
                                    break;
                                case 'modif_user':
                                    $this->ctrU-> ModifUser();
                                    break;
                                case 'login':
                                    $this->ctrU-> login();
                                    break;
                                case 'logout':
                                    AuthController::logout();
                                    break;
                        //________________CLIENT_____________________________________

                                case 'list_client':
                                    $this->ctrC->listClients();
                                    break;
                                case 'add_client':
                                    $this->ctrC->ajoutClient();
                                    break;
                                case 'modif_client':
                                    $this->ctrC-> ModifClient();
                                    break;
                                case 'delete_client':
                                    $this->ctrC-> suppClient();
                                    break;
                        //________________RESERVATION_____________________________________

                                case 'list_res':
                                    $this->ctrR->listReservations();
                                    break;
                                case 'delete_res':
                                    $this->ctrR->suppRes();
                                    break;
                                case 'modif_res':
                                    $this->ctrR->ModiRes();
                                    break;
                                case 'add_res':
                                    $this->ctrR->ajoutRes();
                                    break;
                                case 'full_cal':
                                    $this->ctrR->fullCallendar();
                                    break;

                        //________________PUBLIC_Client_____________________________________

                                case 'inscription_client':
                                    $this->ctrPC->Inscription_client();
                                    break;
                                case 'login_client':
                                    $this->ctrPC->login_client();
                                    break;
                                case 'client_reservation':
                                    $this->ctrPC->Client_Reservation();
                                    break;
                                case 'client_mesRes':
                                    $this->ctrPC->MesRes();
                                    break;
                                case 'logout_client':
                                    Auth_ClientController::logout();
                                    break;
                        //________________CALENDAR_____________________________________
                                
                                case 'load_callendar':
                                    $this->ctrCalendar->SelectCallendar();
                                    break;
                                case 'insert_callendar':
                                    $this->ctrCalendar->InsertCallendar();
                                    break;
                                case 'modif_callendar':
                                    $this->ctrCalendar->editCal();
                                    break;
                                case 'Supp_callendar':
                                    $this->ctrCalendar->SuppCal();
                                    break;
                                case 'Terrin_callendar':
                                    $this->ctrCalendar->SelectCallendarTerrins();
                                    break;
                                }
                            
                        }else{

                            $this->ctrP->home();
                            session_unset();
            
                        } 
                    }
}
                        
                        
  


