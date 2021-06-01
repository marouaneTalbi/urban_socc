<?php
ob_start();
?>
<div class=" p-5 text-center" >
    <div class="container col-5 card mt-2 text-center"id="tessst">
        <div class="p-5 offset-0">
            <img src="./assets/images/success.jpg" width="320px" >
            <h2 class="offset-0 mt-5">Reservation reussie</h2> 
        <div class="mt-5 d-flex text-center">
            <button class="btn btn-success " ><a href="index.php"id="aredirect">Retourner A l'Accueil</a></button>  
            <button class="btn btn-success  offset-1" ><a href="index.php?action=client_mesRes"id="aredirect">Voir ma Reservation</a></button>   
        </div>
        </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>