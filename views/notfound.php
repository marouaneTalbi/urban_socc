<?php
ob_start();
?>
<div class="  text-center" >
    <div class="container col-8  card  text-center"id="tessst">
        <div class="mt-2 text-center">
            <img src="./assets/images/error.jpg" width="800px" >
            <h2 class="offset-0 mt-5 h1">ERROR 404</h2> 
        <div class="mt-2 mb-2 text-center">
            <button class="btn btn-success " ><a href="index.php"id="aredirect">Retourner A l'Accueil</a></button>  
        </div>
        </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>