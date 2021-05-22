<?php


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

    $dbh = new PDO('mysql:host=localhost; dbname=urban_soccer','root','');




    $dbh = new PDO('mysql:host=localhost; dbname=urban_soccer','root','');
    $data = [];

        $sql = "SELECT * FROM reservation where id_match= ?";
        $stmt = $dbh->prepare($sql);

        $stmt->execute([
             $_POST['id_match'],
        ]);

        $result = $stmt->fetchAll();
        foreach ($result as $row) {

            $data[] = array(

                "id_res" => $row['id_res'],
                 "id_match" => $row['id_match'],
                "id_client" => $row['id_client'],
                "start" => $row['start'],
                "end" => $row['end'],
            );
        }



        echo json_encode($data);
        
   
    // $data = [];

    //     $sql = "SELECT * FROM reservation where id_match";
    //     $stmt = $dbh->prepare($sql);
    //     $stmt->execute(
    //         array(
    //          ':id_match' => $_POST['id_match']
    //         )
    //        );
    //     $result = $stmt->fetchAll();
    //     foreach ($result as $row) {

    //         $data[] = array(

    //             "id_res" => $row['id_res'],
    //              "id_match" => $row['id_match'],
    //             "id_client" => $row['id_client'],
    //             "start" => $row['start'],
    //             "end" => $row['end'],
    //         );
    //     }



    //     echo json_encode($data);
}

public function SelectCallendar(){

       $result = $this->adminCalendar->SelectCalendar();
}

public function InsertCallendar(){


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
 
   
    
}


    public function editCal(){

    if(isset($_POST['id_res'])){

         $id = $_POST['id_res'];
    
            $res = new Reservation();
            $res->setId_res($id);
            $editRes = $this->admRes->recupRes($res);
                    
            // $id_client = trim(htmlentities(addslashes($_POST['id_client'])));
            // $id_match = trim(htmlentities(addslashes($_POST['id_match'])));
            $date_debut = trim(htmlentities(addslashes($_POST['start'])));
            $date_fin = trim(htmlentities(addslashes($_POST['end'])));

            // $editRes->setStart($date_debut);
            // $editRes->setEnd($date_fin);

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
