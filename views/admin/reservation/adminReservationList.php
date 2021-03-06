<?php
ob_start();
?>
<div class="container col-8">
    <h1 class="display-6 text-center font-verdana border border-success mt-3 p-3 mb-5">Liste des reservations</h1>
    <table class="table table-striped border border-success mt-5">
        <thead>
            <tr>
                <th>Id</th>
                <th>Terrin</th>
                <th>Client</th>
                <th>Date de debut</th>
                <th>Date de fin</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allR as $res) { ?>
                <tr>
                    <td><?=$res->getId_res();?></td>
                    <td><?=$res->getMatch()->getMatch_name();?></td>
                    <td><?=$res->getClient()->getFirstname();?></td>
                    <td><?=$res->getStart();?></td>
                    <td><?=$res->getEnd();?></td>
                            <td class="text-center">
                                <a class="btn btn-danger" href="index.php?action=delete_res&id=<?=$res->getId_res();?>"
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