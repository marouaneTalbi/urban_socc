<?php
ob_start();
?>
<div class="row " id="login">
        <div id="pop" class="col-12">
        <img src="./assets/images/terrain2.jpg" alt="">
        </div>
        <div id="card2" class="col-4  card ">
            <div class="row">
                <div class="col-12 offset-0">
                    <h3 class="text-center display-6 font-verdana border border-danger mt-3 p-3">CONNEXION</h3>
                    <?php if(isset($error)){ ?>
                        <div class="alert alert-danger text-center"><?php echo $error;?></div>
                        <?php } ?>
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="mt-5">
                            <label for="loginEmail">Login ou Email*</label>
                            <input type="text" id="loginEmail" name="loginEmail" class="form-control mt-2" placeholder="Entrez votre login ou votre email...">
                            
                            <label for="pass">Mot de passe*</label>
                            <input type="password" id="pass" name="pass" class="form-control mt-2" placeholder="Entrez votre mot de passe...">
                            
                            <button  type="submit" class="btn btn-primary col-12 mt-2" name="soumis">se connecter</button>
                        </form>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <small>êtes vous inscrit ? <a href="index.php?action=inscription_client">Rejoingez l'equipe URBAIN-SOCCER !</a> </small>
                </div>
            </div>
        </div>
<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>