<?php
ob_start();
?>
<div class="container col-10">

<h1 class="display-6 text-center font-verdana border border-success mt-3 p-3">Listes des Utilisateurs</h1>

<table class="table table-striped mt-5 border border-success" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Login</th>
            <th>Email</th>
            <th>Poste</th>
            <?php // if($_SESSION['Auth']->role == 1){ ?>
                <th class="text-center">In/Out</th>
                <th colspan="2" class="text-center">Actions</th>
                <?php // } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allU as $user) { ?>
                <tr>
                    <td><?=$user->getId();?></td>
                    <td><?=$user->getFirstname();?></td>
                    <td><?=$user->getName();?></td>
                    <td><?=$user->getLogin();?></td>
                    <td><?=$user->getEmail();?></td>
                    
                    <?php if ($user->getGrade() ==1){
                        
                        echo'<td>superadmin</td>';
                        
                    }else if($user->getGrade() ==2){
                        echo'<td>admin</td>';
                        
                        
                    }else{
                        
                        echo'<td>user</td>';
                        
                    }?>

<?php //if($_SESSION['Auth']->role == 1){ ?>          

<td class="text-center">
    
    <?php
    echo ($user->getStatus())
    ? "<a href='index.php?action=list_user&id=".$user->getId()."&status=".$user->getStatus()."'
     onclick='return confirm(`Etes-vous sûr de vouloir désactiver ?`)' class='btn btn-success'>
     <i class='fas fa-unlock'>Désactiver</i></a>"
    
     : "<a href='index.php?action=list_user&id=".$user->getId()."&status=".$user->getStatus()."'
     onclick='return confirm(`Etes-vous sûr de vouloir activer ?`)' class='btn btn-danger'>
     <i class='fas fa-lock'>Activer</i></a>"
    ?>
        </td>
        <td class="text-center">
            <a class="btn btn-warning" href="index.php?action=modif_user&id=<?=$user->getId();?>">
                <i class="fas fa-pen"></i>
            </a>
        </td>
        <td  class="text-center">
            <a class="btn btn-danger" href="index.php?action=delete_user&id=<?=$user->getId();?>"
                onclick="return confirm('Etes vous sûr de ...')">
                <i class="fas fa-trash"></i>
            </a>
        </td>
        <?php //} ?>
    </tr>
    <?php } ?>
</tbody>

</table>

</div>

<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');
?>