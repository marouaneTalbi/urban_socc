<?php

class AdminUserModel extends DBConn{

public function getUsers(){
        $sql = "SELECT * FROM user_admin";
        $result = $this->getRequest($sql);
        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $tabU = [];
        foreach($rows as $row)  {
        $user = new UserAdmin();
        $user->setId($row->id);
        $user->setFirstname($row->firstname);
        $user->setName($row->name);
        $user->setLogin($row->login);
        $user->setEmail($row->email);
        $user->setPass($row->pass);
        $user->setGrade($row->grade);
        $user->setStatus($row->status);
        array_push($tabU, $user);
        }
        return $tabU;
}

public function deleteUser($id){
    $sql = "DELETE FROM user_admin
            WHERE id = :id";
    $result = $this->getRequest($sql,['id'=> $id]);
    $nb = $result->rowCount();
        return $nb;
}

public function insertUser(UserAdmin $user){
    $sql = "INSERT INTO user_admin(firstname,name,login,email,pass,grade,status)
            VALUES(:firstname,:name,:login,:email,:pass,:grade,:status)";
    $tabParame = [
        "firstname"=>$user->getFirstname(),
        "name"=>$user->getName(),
        "login"=>$user->getLogin(),
        "email"=>$user->getEmail(),
        "pass"=>$user->getPass(),
        "grade"=>$user->getGrade(),
        "status"=>$user->getstatus(),
            ];
    $result = $this->getRequest($sql, $tabParame);
    return $result;
}

public function updateStatut(UserAdmin $user){
        $sql = "UPDATE user_admin
        SET status = :status
        WHERE id = :id";
        $result = $this->getRequest($sql, ['status'=>$user->getStatus(), 'id'=>$user->getId()]);
        return $result->rowCount();
    }

    public function recupUser(UserAdmin $user){
        $sql = "SELECT *
                FROM user_admin
                WHERE id = :id";
        $result = $this->getRequest($sql, ['id'=>$user->getId()]);
        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_OBJ);
                $editUser = new UserAdmin();
                $editUser->setId($row->id);
                $editUser->setFirstname($row->firstname);
                $editUser->setName($row->name);
                $editUser->setLogin($row->login);
                $editUser->setEmail($row->email);
                $editUser->setPass($row->pass);
                $editUser->setGrade($row->grade);
                $editUser->setStatus($row->status);
            return $editUser;
        }
    }

    public function updateUser(UserAdmin $userUp){
        $sql = "UPDATE user_admin
        SET firstname = :firstname,name = :name,login = :login,email = :email,pass = :pass,grade = :grade
        WHERE id = :id";
        $tabParams = [
                "firstname"=>$userUp->getFirstname(),
                "name"=>$userUp->getName(),
                "login"=>$userUp->getLogin(),
                "email"=>$userUp->getEmail(),
                "pass"=>$userUp->getPass(),
                "grade"=>$userUp->getGrade(),
                "id"=>$userUp->getId()
                    ];
      $result = $this->getRequest($sql, $tabParams);
     return $result->rowCount();
}

    public function signIn($loginEmail, $pass){
            $sql = "SELECT * FROM user_admin
                    WHERE (login = :logEmail OR email = :logEmail) AND pass = :pass";
            $result = $this->getRequest($sql,['logEmail'=>$loginEmail, 'pass'=>$pass]);
            $row = $result->fetch(PDO::FETCH_OBJ);
            return $row;
        }
}





