<?php
ob_start();
var_dump($_SESSION);
?>


<div class="container col-8">

    <h1 class="display-6 text-center font-verdana border border-success mt-3 p-3 mb-5">Liste des Matchs</h1>
    <table class="table table-striped border border-success mt-5">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Image</th>

                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allM as $match) { ?>
                <tr>
                    <td><?=$match->getId_match();?></td>
                    <td><?=$match->getMatch_name();?></td>
                    <td><img src="assets/images/<?=$match->getImage();?>" width="100px">  </td>

                    <td class="text-center">
                        <a class="btn btn-success" href="index.php?action=modif_match&id=<?=$match->getId_match();?>">
                            <i class="fas fa-pen"></i></a>
                        </td>
                            <td class="text-center">
                                <a class="btn btn-danger" href="index.php?action=delete_match&id=<?=$match->getId_match();?>"
                                    onclick="return confirm('Etes vous sûr de ...')">
                                    <i class="fas fa-trash"></i></a>
                                </td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                        
                    </table>
                    
                </div>







<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');
?>