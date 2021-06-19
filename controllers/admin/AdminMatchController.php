<?php
class AdminMatchController{

    private $admMatch;

    public function __construct()
    {
        $this->admMatch = new AdminMatchModel();
    }

public function listMatch(){
    AuthController::isLogged();
    $allM = $this->admMatch->getMatchs();
    require_once('./views/admin/matchs/adminMatchList.php');
}

public function suppMatch(){
    AuthController::isLogged();
    if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
        $id = trim($_GET['id']);
        $nbLine = $this->admMatch->deleteMatch($id);
        if($nbLine > 0){
                header('location:index.php?action=list_match');
            }
    }
}

public function ajoutMatch(){
    AuthController::isLogged();
    if(isset ($_POST['soumis']) && !empty($_POST['name'])){
        $nom_match = trim(htmlentities(addslashes($_POST['name'])));
        $image = $_FILES['image']['name'];
        $match = new Matchs();
        $match->setMatch_name($nom_match);
        $match->setImage($image);
        $destination = './assets/images/';
        move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
        $oui = $this->admMatch-> insertMatch($match);
            if($oui){
                header('location:index.php?action=list_match');
            }
        }
        require_once('./views/admin/matchs/adminAddMatch.php');
}

public function modifMatch(){
    AuthController::isLogged();
    if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
        $id = $_GET['id'];
        $modifM = new Matchs();
        $modifM->setId_match($id);
        $editMatch = $this->admMatch->MatchRecup($modifM);
        $tabM = $this->admMatch->getMatchs();
        if(isset($_POST['soumis']) && !empty($_POST['name'])){
            $name = trim(htmlentities(addslashes($_POST['name'])));
            $image = $_FILES['image']['name'];
            $editMatch->setMatch_name($name);
            $editMatch->setImage($image);
            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
            $thumbsUp = $this->admMatch->updateMatch($editMatch); 
            header('location:index.php?action=list_match');
        }
        require_once('./views/admin/matchs/adminModifMatch.php');
    }
}

}