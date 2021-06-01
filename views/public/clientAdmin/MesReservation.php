
<?php
ob_start();


?>

<div class="container col-8 card" class="bg-light">

    <h1 class="display-6 text-center font-verdana border border-success   mt-3 p-3 mb-5">Liste des ress</h1>
    <table class="table table-striped border border-dark mt-5 bg-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Match</th>
                <th>Date de debut</th>
                <th>Date de fin</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($allR as $MesRes) { ?>
                <tr>
                    <td><?=$MesRes->getId_res();?></td>
                    <td><?=$MesRes->getMatch()->getMatch_name();?></td>
                    <td><?=$MesRes->getStart();?></td>
                    <td><?=$MesRes->getEnd();?></td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</div>



<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>