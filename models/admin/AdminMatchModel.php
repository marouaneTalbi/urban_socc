<?php

class AdminMatchModel extends DBConn {

    public function getMatchs(){
        $sql = "SELECT *
                FROM matchs";
        $result = $this->getRequest($sql);
        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $tabM = [];
        foreach($rows as $row)  {
            $match = new Matchs();
            $match->setId_match($row->id_match);
            $match->setMatch_name($row->match_name);
            $match->setImage($row->image);
            array_push($tabM, $match);
        }
            return $tabM;
    }

    public function deleteMatch($id){
        $sql = "DELETE FROM matchs
                WHERE id_match = :id";
        $result = $this->getRequest($sql,['id'=> $id]);
        $nb = $result->rowCount();
        return $nb;
    }

    public function insertMatch(Matchs $match){
        $sql = "INSERT INTO matchs(match_name,image)
                VALUES(:match_name,:image)";
        $tabParame = [
            "match_name"=>$match->getMatch_name(),
            "image"=>$match->getImage(),
                ];
        $result = $this->getRequest($sql, $tabParame);
        return $result;
    }

    public function MatchRecup(Matchs $match){
        $sql = "SELECT *
                FROM matchs
                WHERE id_match = :id";
        $result = $this->getRequest($sql, ['id'=>$match->getId_match()]);
        if($result->rowCount() > 0){
            $matchs = $result->fetch(PDO::FETCH_OBJ);
            $mat = new Matchs();
            $mat->setId_match($matchs->id_match);
            $mat->setMatch_name($matchs->match_name);
            $mat->setImage($matchs->image);
            return $mat;
        }
    }

    public function updateMatch(Matchs $match){
        if($match->getImage() === ""){
            $sql = "UPDATE matchs SET match_name = :match_name WHERE id_match = :id_match";
        $tabPaname = ["match_name"=>$match->getMatch_name(),"id_match"=>$match->getId_match()];
        }else{
            $sql = "UPDATE matchs
                    SET 
                    match_name = :match_name, 
                    image = :image
                    WHERE id_match = :id_match";
                    $tabPaname = ["match_name"=>$match->getMatch_name(),
                                    "image"=>$match->getImage(),
                                "id_match"=>$match->getId_match()];
       } 
          $result = $this->getRequest($sql, $tabPaname);
            return $result->rowCount();
    }
}