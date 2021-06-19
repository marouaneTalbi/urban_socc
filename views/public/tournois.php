<?php
ob_start();
?>
<div class="container mr-5">
      <img class="tournoisImg" src="./assets/images/tournois.jpg"  >
</div>
<div class="  text-center" >
    <div class="container col-8 mb-5 card  text-center" id="tessst">
      <div>
        <ul class="h3" >
          <li>Tournoi à partir de 8 équipes</li>
          <li>Tournoi encadré et arbitré</li>
          <li>Cocktail premium d'après tournoi</li>
          <li>Maillots personnalisés</li>
        </ul>
      </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>