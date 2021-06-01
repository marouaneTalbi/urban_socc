<?php
ob_start();
?>

<div class="container ">
    <div class="row">
            <div class="container col-7 card p-5 mt-5">
                <h2 class="text-center display-6 font-verdana border border-danger mt-3 p-3">Formulaire d'inscription </h2>
                <div class="row">
                <div class="col-12 offset-0">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center" enctype="multipart/form-data">
                    <div class="row mt-3">
                        <div class="col">
                            <label for="nom">Nom</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Entrez le nom">
                        </div>
                        <div class="col">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Entrez le prénom">
                        </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="telephone">Telephone</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Telephone">
                        </div>
                        <div class="col">
                            <label for="adresse">adresse</label>
                            <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Entrez l'adresse">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="mail">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Entrez le mail">
                        </div>
                   
                      <div class="col">
                            <label for="login">Login</label>
                            <input type="text" id="login" name="login" class="form-control" placeholder="Entrez le login">
                        </div>
                    </div>
                    <div class="col">
                            <label for="pass">Mot de passe</label>
                            <input type="password" id="pass" name="pass" class="form-control" placeholder=" Mot de Passe">
                    </div>
                    <button type="submit" class="btn btn-primary  col-12 mt-3" name="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>