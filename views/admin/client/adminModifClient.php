<?php ob_start();

?>
<div class="container col-10 card p-3 mt-5">
<h1 class="text-center display-6 font-verdana border border-warning mt-3 p-3">Formulaire de modification du Client N°00<?=$editUs->getId();?></h1>
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
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" class="form-control" value="<?=$editUs->getLogin();?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="mail">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?=$editUs->getEmail();?>">
                    </div>
                    <div class="col">
                        <label for="pass">Mot de passe</label>
                        <input type="text" id="pass" name="pass" class="form-control" value="<?=$editUs->getPass();?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="mail">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?=$editUs->getPhone();?>">
                    </div>
                    <div class="col">
                        <label for="pass">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control" value="<?=$editUs->getAdresse();?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-warning  col-12 mt-3" name="soumis">Modifier</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); 
    require_once("./views/templateAdmin.php");
?>