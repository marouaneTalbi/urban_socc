<?php
ob_start();
var_dump($_SESSION['Auth_client']);
$data = $_SESSION['Auth_client'];
?>
<script  type="text/javascript">


var x = '<?php echo json_encode($_SESSION['Auth_client']) ?>';





</script>


<div class="container col-10 card p-3 mt-5">
<h1 class="text-center display-6 font-verdana border border-warning mt-3 p-3">Formulaire d'ajout</h1>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="index.php?action=payment_cal" method="post" class="text-center" >
                    <div class="row mt-3">
                        <label for="">Terrains</label>
                            <select class="form-select" name="id_match" id="id_match">
                            <option value="">Choisir</option>
                            <?php foreach($matchs as $match){  ?>
                            <option value="<?php echo $match->getId_match();?>"><?php echo $match->getMatch_name();?></option>
                        <?php }?>
                    </select>
                        <input type="hidden" name="id_client" id="id_client" value="<?php echo $_SESSION['Auth_client']->id?>">
                        <input type="hidden" name="prix" id="prix" value="">
                        <input type="hidden" name="firstname" id="firstname" value="<?php echo$_SESSION['Auth_client']->firstname ?>">
                        <input type="hidden" name="name" id="name" value="<?php echo$_SESSION['Auth_client']->name ?>">
                        <input type="hidden" name="email" id="email" value="<?php echo$_SESSION['Auth_client']->email ?>">
                        <div class="container mt-2" >
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-warning  col-12 mt-3" id="submit" name="submit">Ajout</button>
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
<script  src="./assets/js/Stripe.js"></script>
<script  src="./assets/js/CalendarClient.js"></script>
