<?php
ob_start();
?>
<div class="container col-10">
    <h1 class="display-6 text-center font-verdana border border-success mt-3 p-3">Listes des Clients</h1>
    <table class="table table-striped mt-5 border border-success" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Telephone</th>
                <th>Adrese</th>
                <th>Login</th>
                <th>Email</th>
                <?php  if($_SESSION['Auth']->grade == 1){ ?>
                    <th colspan="2" class="text-center">Actions</th>
                    <?php  } ?>
                </tr>
            </thead>
            <tbody>
                        <?php foreach ($allC as $client) { ?>
                            <tr>
                                <td><?=$client->getId();?></td>
                                <td><?=$client->getFirstname();?></td>
                                <td><?=$client->getName();?></td>
                                <td><?=$client->getPhone();?></td>
                                <td><?=$client->getAdresse();?></td>
                                <td><?=$client->getLogin();?></td>
                                <td><?=$client->getEmail();?></td>
            <?php if($_SESSION['Auth']->grade == 1){ ?>          
                    <td class="text-center">
                        <a class="btn btn-warning" href="index.php?action=modif_client&id=<?=$client->getId();?>">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>
                    <td  class="text-center">
                        <a class="btn btn-danger" href="index.php?action=delete_client&id=<?=$client->getId();?>"
                            onclick="return confirm('Etes vous sûr de ...')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
    </table>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');
?>