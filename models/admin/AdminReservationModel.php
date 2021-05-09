<?php

class AdminReservationModel extends DBConn{

    public function getReservation(){

        $sql = "SELECT *
                FROM reservation r
                INNER JOIN 
                matchs m
                on r.id_match = m.id_match
                INNER JOIN 
                user_client c
                on r.id_client = c.id";
                 
        $result = $this->getRequest($sql);


        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $tabM = [];

        foreach($rows as $row)  {
            
            $res = new Reservation();

            $res->setId_res($row->id_res);
            $res->getMatch()->setId_match($row->id_match);
            $res->getMatch()->setMatch_name($row->match_name);
            $res->getClient()->setId($row->id_client);
            $res->getClient()->setFirstname($row->firstname);
            $res->setDate($row->date);
            $res->setHeure($row->heure);
            $res->setDure($row->dure);

            array_push($tabM, $res);
        }

            return $tabM;
    }

    public function deleteRes($id){

        $sql = "DELETE FROM reservation WHERE id_res = :id";

        $result = $this->getRequest($sql,['id'=> $id]);
        $nb = $result->rowCount();
            return $nb;
    }

    public function updateReservation(Reservation $res){

            $sql = "UPDATE reservation
                    SET 
                    id_match = :id_match, 
                    date = :date, 
                    heure = :heure, 
                    dure = :dure
                    WHERE id_res = :id_res";

                    $tabPaname = [
                                "id_match"=>$res->getMatch()->getId_match(),
                                "date"=>$res->getDate(),
                                "heure"=>$res->getHeure(),
                                "dure"=>$res->getDure(),
                                "id_res"=>$res->getId_res()
                            ];
                            


          $result = $this->getRequest($sql, $tabPaname);
            return $result->rowCount();
    }


    public function recupRes(Reservation $reservation){

        $sql = "SELECT *
                FROM reservation r
                INNER JOIN 
                matchs m
                on r.id_match = m.id_match
                INNER JOIN 
                user_client c
                on r.id_client = c.id
                WHERE id_res = :id_res";
        
        $result = $this->getRequest($sql, ['id_res'=>$reservation->getId_res()]);
        
        if($result->rowCount() > 0){
            
            $row = $result->fetch(PDO::FETCH_OBJ);

                $editRes = new Reservation();
                $editRes->setId_res($row->id_res);
                $editRes->getMatch()->setId_match($row->id_match);
                $editRes->getClient()->setId($row->id_client);
                $editRes->getMatch()->setMatch_name($row->match_name);
                $editRes->getClient()->setFirstname($row->firstname);
                $editRes->setDate($row->date);
                $editRes->setHeure($row->heure);
                $editRes->setDure($row->dure);

            return $editRes;
        }

    }

    public function insertRes(Reservation $res){

        $sql = "INSERT INTO reservation (id_match,id_client,date,heure,dure)
                VALUES(:id_match,:id_client,:date,:heure,:dure)";
        
        $tabParame = [
    
            "id_match"=>$res->getMatch()->getId_match(),
            "id_client"=>$res->getClient()->getId(),
            "date"=>$res->getDate(),
            "heure"=>$res->getHeure(),
            "dure"=>$res->getDure(),
    
                ];
    
        $result = $this->getRequest($sql, $tabParame);
    
        return $result;
    
    }


   


}