<?php ob_start();?>
<div class="container">
    <div class="row">
        <div class="col-4 offset-4 card p-5">
        <img src="./assets/images/login.png" alt="">
            <div class="col-12  p-2">
                <h1 class="display-6 text-center font-verdana text-decoration-underline">LOGIN</h1>
                <?php if(isset($error)){ ?>
                    <div class="alert alert-danger text-center"><?php echo $error;?></div>
                <?php } ?>
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                    <label for="loginEmail">Login ou Email*</label>
                    <input type="text" id="loginEmail" name="loginEmail" class="form-control mt-2" placeholder="Entrez votre login ou votre email...">
                    <label for="pass">Mot de passe*</label>
                    <input type="password" id="pass" name="pass" class="form-control mt-2" placeholder="Entrez votre mot de passe...">
                    <button  type="submit" class="btn btn-primary col-12 mt-2" name="soumis">se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    $contenu = ob_get_clean();
    require_once("./views/templateAdmin.php");
?>

