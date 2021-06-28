<?php

class AdminUserController{

    private $admUser;

    public function __construct()
    {
        $this->admUser = new AdminUserModel();
    }

public function listUsers(){
    AuthController::isLogged();
    if(isset($_GET['id']) && isset($_GET['status']) && !empty($_GET['id'])){
        $id = trim(htmlentities(addslashes($_GET['id'])));
        $status = trim(htmlentities(addslashes($_GET['status'])));
        $user = new UserAdmin();
            if($status == 1){
                $status = 0;
            }else{
                $status = 1;
            }
        $user->setId($id);
        $user->setStatus($status);
        $this->admUser->updateStatut($user);
    }
    $allU = $this->admUser->getUsers();
    require_once('./views/admin/user/adminUserList.php');
}

public function suppUser(){
    AuthController::isLogged();
    if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
        $id = trim($_GET['id']);
        $nbLine = $this->admUser->deleteUser($id);
        if($nbLine > 0){
                header('location:index.php?action=list_user');
            }
    }
}

public function ajoutUser(){

    AuthController::isLogged();

    if(isset ($_POST['submit'])){

        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) && strlen($_POST['pass']) >= 4){

            $firstname = trim(htmlentities(addslashes($_POST['firstname'])));
            $name = trim(htmlentities(addslashes($_POST['name'])));
            $login = trim(htmlentities(addslashes($_POST['login'])));
            $email = trim(htmlentities(addslashes($_POST['email'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
            $grade = (trim(htmlentities(addslashes($_POST['grade']))));



        $user = new UserAdmin();
            $user->setFirstname($firstname);
            $user->setName($name);
            $user->setLogin($login);
            $user->setEmail($email);
            $user->setPass($pass);
            $user->setGrade($grade);
            $user->setStatus(1);
        $oui = $this->admUser->insertUser($user);
            if($oui){
                header('location:index.php?action=list_user');
            }
        }
    }
        require_once('./views/admin/user/adminAddUser.php');
}

public function ModifUser(){
    AuthController::isLogged();
    if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
        $id = $_GET['id'];
        $modifU = new UserAdmin();
        $modifU->setId($id);
        $editUs = $this->admUser->recupUser($modifU);
        if(isset($_POST['soumis']) && !empty($_POST['login']) && !empty($_POST['pass'])){
            $firstname = trim(htmlentities(addslashes($_POST['firstname'])));
            $name = trim(htmlentities(addslashes($_POST['name'])));
            $login = trim(htmlentities(addslashes($_POST['login'])));
            $email = trim(htmlentities(addslashes($_POST['email'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
            $grade = trim(htmlentities(addslashes($_POST['grade'])));
            $editUs->setFirstname($firstname);
            $editUs->setname($name);
            $editUs->setLogin($login);
            $editUs->setEmail($email);
            $editUs->setPass($pass);
            $editUs->setGrade($grade);
            $ok = $this->admUser->updateUser($editUs); 
            header('location:index.php?action=list_user');
        }
        require_once('./views/admin/user/adminModifUser.php');
    }
}

public function login(){
    
    if(isset($_POST['soumis'])){
        if(strlen($_POST['pass']) >= 4 && !empty($_POST['loginEmail'])){
            $loginEmail = trim(htmlentities(addslashes($_POST['loginEmail'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
            $log_u = $this->admUser->signIn($loginEmail, $pass);
                if(!empty($log_u)){
                    if($log_u->status > 0){
                        session_start();
                        $_SESSION['Auth'] = $log_u;
                        header('location:index.php?action=list_match');
                    }else{
                        $error = "Votre compte a été supprimé";
                    }
                }else{
                    $error = "Votre login/email ou/et mot de passe ne corespondent pas"; 
                }
        }else{
            $error = "Entrée les données valides"; 
        }
    }
    require_once('./views/admin/user/login.php');
}

}