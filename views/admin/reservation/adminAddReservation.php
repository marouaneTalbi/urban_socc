<?php ob_start();
var_dump($_POST)
?>
<div class="container col-10 card p-3 mt-5">
<h1 class="text-center display-6 font-verdana border border-warning mt-3 p-3">Formulaire d'ajout</h1>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center" >

                <div class="row mt-3">
                    <label for="">Terrains</label>
                         <select class="form-select" name="id_match" id="">
                         <option value="">Choisir</option>
                        <?php foreach($matchs as $match){  ?>
                        <option value="<?= $match->getId_match();?>"><?=$match->getMatch_name();?></option>
                    <?php }?>
                </select>
                <label for="">Clients</label>
                <select class="form-select" name="id_client" id="">
                <option value="">Choisir</option>

                        <?php foreach($clients as $client){  ?>
                    
                    <option value="<?= $client->getId();?>"><?=$client->getFirstname();?></option>

                    <?php }?>
                </select>
              
                        
                    </div>
                    <div class="col">
                        <label for="login">Date</label>
                        <input type="date" id="date" name="date" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="mail">heure</label>
                        <input type="time" id="heure" name="heure" class="form-control" >
                    </div>
                    <div class="col">
                        <label for="pass">Dure</label>
                        <input type="text" id="dure" name="dure" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-warning  col-12 mt-3" name="submit">Ajout</button>
            </form>
                    </div>
                  
              
          </div>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); 
    require_once("./views/templateAdmin.php");
?>