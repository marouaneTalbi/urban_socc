<?php

class PublicClientModel extends DBConn{




    public function recupResByClient(Reservation $reservation){

        $sql = "SELECT *
                FROM reservation r
                INNER JOIN 
                matchs m
                on r.id_match = m.id_match
                INNER JOIN 
                user_client c
                on r.id_client = c.id
                WHERE id_client = :id";
        
        $result = $this->getRequest($sql, ['id'=>$reservation->getClient()->getId()]);

        $p =  $reservation->getClient()->getId();

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
    




    
}