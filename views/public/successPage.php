<?php
ob_start();
?>
<div class="container p-5" id="pop">
    <div class="container col-6 card mt-2">
        <div class="p-5 offset-2">
            <img src="./assets/images/success.jpg" width="300px" >
            <h2 class="offset-1 mt-5">Reservation reussi</h2> 
        <div class="mt-5">
            <button class="btn btn-success" ><a href="index.php"id="aredirect">Retourner A l'Accueil</a></button>  
            <button class="btn btn-success" ><a href="index.php?action=client_mesRes"id="aredirect">Voir ma Reservation</a></button>   
        </div>
        </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>