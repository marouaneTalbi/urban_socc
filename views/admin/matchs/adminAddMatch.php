<?php ob_start();?>

<div class="container col-6 card p-5 mt-5">

    <h1 class="display-6 text-center font-verdana border border-danger mt-3 p-3">Ajout de categories</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post"  enctype="multipart/form-data">
                    
                   
                    <label for="match">Nom</label>
                    <input type="text" id="name" name="name" class="form-control mt-2" placeholder="Veuillez le nom du terrain ">
                   
                    <label for="match">Image</label>
                    <input type="file" id="image" name="image" class="form-control"  >
                    <button  type="submit" class="btn btn-primary col-12 mt-2" name="soumis">Insérer</button>
                </form>
                
                
            </div>
        </div>
    </div>
    
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');

?>