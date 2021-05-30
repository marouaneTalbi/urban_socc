<?php


class AdminCalendarModel extends DBConn {




    public function SelectTerrin(Reservation $reservation){

        $data = [];
        $sql = "SELECT * FROM reservation where id_match= :id_match";
        $stmt = $this->getRequest($sql, ['id_match'=>$reservation->getMatch()->getId_match()]);

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
}



    public function SelectCalendar(){
        
            $sql = "SELECT * FROM reservation order by id_res";
            $stmt = $this->getRequest($sql);
            $result = $stmt->fetchAll();

            foreach ($result as $row) {

                $tabMs[] = array(

                    "id_res" => $row['id_res'],
                    "id_match" => $row['id_match'],
                    "id_client" => $row['id_client'],
                    "start" => $row['start'],
                    "end" => $row['end'],
                    );
                }
                echo json_encode($tabMs);
    }

    public function InsertCal(Reservation $res){
        
        $sql = "INSERT INTO reservation (id_match,id_client,start,end) VALUES (:id_match,:id_client,:start,:end)";
        
        $tabParame = [
            "id_match"=>$res->getMatch()->getId_match(),
            "id_client"=>$res->getClient()->getId(),
            "start"=>$res->getStart(),
            "end"=>$res->getEnd(),
                ];
    
        $result = $this->getRequest($sql, $tabParame);
    
        return $result;
       

    }

    public function UpdatetCal(Reservation $res){
        
       
         $sql = "UPDATE reservation SET  start=:start, end=:end WHERE id_res=:id_res ";


        $tabParame = [
    
            // "id_match"=>$res->getMatch()->getId_match(),
            // "id_client"=>$res->getClient()->getId(),
            "start"=>$res->getStart(),
            "end"=>$res->getEnd(),
            "id_res"=>$res->getId_res(),
                ];

        $result = $this->getRequest($sql, $tabParame);
    
        return $result->rowCount();

    }

    public function SupprimerCal($id){

        $sql = "DELETE FROM reservation WHERE id_res = :id";

        $result = $this->getRequest($sql,['id'=> $id]);
        $nb = $result->rowCount();
            return $nb;
    }

}    

