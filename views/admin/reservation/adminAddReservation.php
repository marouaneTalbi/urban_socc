<?php ob_start();
var_dump($_POST, true)
?>

<script>


</script>


 <div class="container col-10 card p-3 mt-5">
<h1 class="text-center display-6 font-verdana border border-warning mt-3 p-3">Formulaire d'ajout</h1>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center" >

                <div class="row mt-3">
                    <label for="">Terrains</label>
                         <select class="form-select" name="id_match" id="id_match">
                         <option value="">Choisir</option>
                        <?php foreach($matchs as $match){  ?>
                        <option value="<?php echo $match->getId_match();?>"><?php echo $match->getMatch_name();?></option>
                    <?php }?>
                </select>
                <label for="">Clients</label>
                <select class="form-select" name="id_client" id="id_client">
                <option value="">Choisir</option>

                        <?php  foreach($clients as $client){  ?>
                    
                    <option value="<?php echo  $client->getId();?>"><?php echo $client->getFirstname();?></option>

                    <?php }?>
                </select>
              
                        
                    </div>
                    <div class="row mt-3 col-12">
                    <div id="calendar"></div>
                    </div>
     
                </div>

                <button type="submit" class="btn btn-warning  col-12 mt-3" id="submit" name="submit">Ajout</button>
            </form>
                    </div>
                  
              
          </div>
        </div>
    </div>
</div> 

<?php $contenu = ob_get_clean(); 
    require_once("./views/templateAdmin.php");
?>
<script async src="./assets/js/Calendar.js"></script>
