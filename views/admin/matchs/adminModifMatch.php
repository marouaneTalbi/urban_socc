<?php ob_start();?>
 <div class="container col-10 card p-2 mt-5">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace border border-warning mt-3 p-3">
         Modifier Terrain N°00<?=$editMatch->getId_match();?></h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <label for="marque">Titre</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?=$editMatch->getMatch_name();?>" >
                    </div>
                </div>
                <div class="row">
                    <div class="container  col-6 ">
                            <img src="./assets/images/<?=$editMatch->getImage();?>" alt="" width="400" class="img-thumbnail mt-2">
                    </div>
                    <div class="container col-6 ">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"  >
                    </div>
                </div>
                <button type="submit" class="btn btn-warning  col-12 mt-2" name="soumis">Modifier</button>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>