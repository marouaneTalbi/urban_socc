<?php ob_start();
?>
<div class="container col-10 card p-3 mt-5">
<h1 class="text-center display-6 font-verdana border border-warning mt-3 p-3">Formulaire de modification de l'utilisateur N°00<?=$editUs->getId();?></h1>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center" enctype="multipart/form-data">
                <div class="row mt-3">
                    <div class="col">
                        <label for="nom">Nom</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" value="<?=$editUs->getFirstname();?>">
                    </div>
                    <div class="col">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?=$editUs->getName();?>">
                    </div>
                    <div class="col">
                        <label for="grade">Poste</label>
                        <select id="grade" name="grade" class="form-select">
                        <?php  if ($editUs->getGrade() ==1){
                                        echo'<option value="1">Superadmin</option>';
                                        }else if($editUs->getGrade() ==2){
                                        echo'<option value="2">Admin</option>';
                                        }else{
                                        echo'<option value="3">User</option>';
                                        }?>
                            <option value="1">Superadmin</option>
                            <option value="2">Admin</option>
                            <option value="3">User</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" class="form-control" value="<?=$editUs->getLogin();?>">
                    </div>
                    <div class="col">
                        <label for="mail">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?=$editUs->getEmail();?>">
                    </div>
                </div>
                <div class="col">
                        <label for="pass">Mot de passe</label>
                        <input type="pass" id="pass" name="pass" class="form-control" value="<?=$editUs->getPass();?>">
                    </div>
                <button type="submit" class="btn btn-warning  col-12 mt-3" name="soumis">Modifier</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); 
    require_once("./views/templateAdmin.php");
?>