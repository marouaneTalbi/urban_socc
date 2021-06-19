<?php

class AdminClientModel extends DBConn{

    public function getClients(){
        $sql = "SELECT * FROM user_client  ";
        $result = $this->getRequest($sql);
        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $tabU = [];
        foreach($rows as $row)  {
            $user = new Client();
                $user->setId($row->id);
                $user->setFirstname($row->firstname);
                $user->setName($row->name);
                $user->setPhone($row->phone);
                $user->setAdresse($row->adresse);
                $user->setLogin($row->login);
                $user->setEmail($row->email);
                $user->setPass($row->pass);
                array_push($tabU, $user);
        }
        return $tabU;
}

public function insertClient(Client $client){

    $sql = "INSERT INTO user_client(firstname,name,login,email,pass, phone,adresse)
            VALUES(:firstname,:name,:login,:email,:pass, :phone,:adresse)";
    $tabParame = [
        "firstname"=>$client->getFirstname(),
        "name"=>$client->getName(),
        "login"=>$client->getLogin(),
        "email"=>$client->getEmail(),
        "pass"=>$client->getPass(),
        "phone"=>$client->getPhone(),
        "adresse"=>$client->getAdresse(),
            ];
    $result = $this->getRequest($sql, $tabParame);
    return $result;
}

public function updateClient(Client $clientUp){

    $sql = "UPDATE user_client
    SET firstname = :firstname,name = :name,login = :login,email = :email,pass = :pass,phone=:phone,
    adresse=:adresse
    WHERE id = :id";
    $tabParams = [
        "id"=>$clientUp->getId(),
        "firstname"=>$clientUp->getFirstname(),
        "name"=>$clientUp->getName(),
        "login"=>$clientUp->getLogin(),
        "email"=>$clientUp->getEmail(),
        "pass"=>$clientUp->getPass(),
        "phone"=>$clientUp->getPhone(),
        "adresse"=>$clientUp->getAdresse(),
                ];
        $result = $this->getRequest($sql, $tabParams);
        return $result->rowCount();

}

public function recupClient(Client $client){
    $sql = "SELECT *
            FROM user_client
            WHERE id = :id";
    $result = $this->getRequest($sql, ['id'=>$client->getId()]);
    if($result->rowCount() > 0){
        $row = $result->fetch(PDO::FETCH_OBJ);
            $editUser = new Client();
            $editUser->setId($row->id);
            $editUser->setFirstname($row->firstname);
            $editUser->setName($row->name);
            $editUser->setLogin($row->login);
            $editUser->setEmail($row->email);
            $editUser->setPass($row->pass);
            $editUser->setPhone($row->phone);
            $editUser->setAdresse($row->adresse);
        return $editUser;
    }
}

public function deleteClient($id){
    $sql = "DELETE FROM user_client
            WHERE id = :id";
    $result = $this->getRequest($sql,['id'=> $id]);
    $nb = $result->rowCount();
        return $nb;
}

public function signInClient($loginEmail, $pass){
    $sql = "SELECT * FROM user_client
            WHERE (login = :logEmail OR email = :logEmail) AND pass = :pass";
     $result = $this->getRequest($sql,['logEmail'=>$loginEmail, 'pass'=>$pass]);
     $row = $result->fetch(PDO::FETCH_OBJ);
     return $row;
 }




}