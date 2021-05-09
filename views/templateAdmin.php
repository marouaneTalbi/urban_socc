<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./assets/css/templateAdmin.css">
<link rel="stylesheet" href="./assets/css/css2.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style>
</style>
</head>
<body class="bg-light" >
<button class="openbtn" onclick="openNav()">&#9776;ADMINISTRATION</button>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div id="main">

</div>
<a href="index.php"style="font-family: Georgia, serif;"><img src="./assets/images/logo.png" alt="" width="100" >URBAN-SOCCER</a>

  <?php 
  if(isset($_SESSION['Auth'])){
    echo ' <h4 class="text-end text-center text-white mt-5">Bonjour :' .$_SESSION['Auth']->firstname;
  } ?>
  </h4>
  <?php
  
  ?>
  
<?php if(isset($_SESSION['Auth'])){ ?>
<a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
  
  <button class="dropdown-btn"><i class="fas fa-layer-group text-white"></i>TERRINS
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="index.php?action=list_match"><i class="fas fa-list"></i>Liste</a>
    <a href="index.php?action=add_match"><i class="fas fa-plus"></i>Ajout</a>
  </div>

  <button class="dropdown-btn"><i class="fas fa-layer-group text-white"></i>CLIENTS
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="index.php?action=list_client"><i class="fas fa-list"></i>Liste</a>
    <a href="index.php?action=add_client"><i class="fas fa-plus"></i>Ajout</a>
  </div>

  <button class="dropdown-btn"><i class="fas fa-layer-group text-white"></i>RESERVATIONS
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="index.php?action=list_res"><i class="fas fa-list"></i>Liste</a>
    <a href="index.php?action=add_res"><i class="fas fa-plus"></i>Ajout</a>
  </div>
  
  <?php 
  if($_SESSION['Auth']->grade != 3) {
    ?>

  <button class="dropdown-btn"><i class="fas fa-users text-white"></i>Utilisateurs  
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <?php if($_SESSION['Auth']->grade == 1) { ?>
    <a href="index.php?action=list_user"><i class="fas fa-list"></i>Liste</a>
    <a href="index.php?action=add_user"><i class="fas fa-plus"></i>Inscription</a>
    <?php } ?>
  </div>

  <?php }} ?>


</div>




<div class="container">
 
  <?php echo $contenu; ?>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="./assets/js/templateAdmin.js"></script>
<script src="./assets/js/scriptAjax.js"></script>


</body>
</html> 