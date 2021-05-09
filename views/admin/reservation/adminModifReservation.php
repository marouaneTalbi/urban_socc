<?php ob_start();

?>
<div class="container col-10 card p-3 mt-5">
<h1 class="text-center display-6 font-verdana border border-warning mt-3 p-3">Formulaire de modification de l'utilisateur N°00<?=$editRes->getId_res();?></h1>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center" >

                <div class="row mt-3">
                    <div class="col">
                        <label for="nom">Client</label>
                        <input type="text" disabled id="client" name="id_client" class="form-control" value="<?=$editRes->getClient()->getFirstname();?>">
                        <input type="hidden" name="id_client"  value="<?=$editRes->getClient()->getId();?>">
                        <input type="hidden" name="id_client"  value="<?=$editRes->getId_res();?>">

                    </div>
                  
                            <label for="">Terrains</label>
                            <select class="form-select" name="id_match" id="">
                            
                            <option selected value="<?=$editRes->getMatch()->getId_match();?>">

                                <?php foreach($Matchs as $match){
                                        if($editRes->getMatch()->getId_match() == $match->getId_match()){
                                            echo   $match->getMatch_name();
                                        }} ?>

                                </option>
                                    <?php foreach($Matchs as $match){ if($match->getId_match() != $editRes->getMatch()->getId_match()) { ?>

                                
                                <option value="<?= $match->getId_match();?>"><?=$match->getMatch_name();?></option>

                                 <?php } }?>
                            </select>
                        
                    </div>
                    <div class="col">
                        <label for="login">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?=$editRes->getDate();?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="mail">heure</label>
                        <input type="time" id="heure" name="heure" class="form-control" value="<?=$editRes->getHeure();?>">
                    </div>
                    <div class="col">
                        <label for="pass">Dure</label>
                        <input type="text" id="dure" name="dure" class="form-control" value="<?=$editRes->getDure();?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-warning  col-12 mt-3" name="soumis">Modifier</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); 
    require_once("./views/templateAdmin.php");
?>