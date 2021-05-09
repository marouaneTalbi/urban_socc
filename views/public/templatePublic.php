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
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid"> 
       <a href="index.php" class="  col-3 " style="text-decoration:none">
        <p class="d-inline h1 text-white" style="font-family: Georgia, serif;">URBAN-
        <p class="d-inline h1 text-danger" style="font-family: Georgia, serif;">SOCCER</p>
         </p> </a>
          <div class="collapse navbar-collapse " style="margin-left: 600px;" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item m-2  col-4">
                <a class="nav-link" aria-current="page" href="index.php" style="font-family: Georgia, serif;">Accueil</a>
              </li>
              <?php if(isset($_SESSION['Auth_client'])){?>
              <li class="nav-item m-2  col-5">
                <a class="nav-link" href="index.php?action=client_mesRes" style="font-family: Georgia, serif;">Mes Reservation</a>
              </li>

              <li class="nav-item m-2  col-5">
                <a class="nav-link" href="index.php?action=logout_client" style="font-family: Georgia, serif;">Deconnexion</a>
              </li>

              <li class="nav-item m-2  col-5">
                <a class="nav-link" href="index.php?action=client_reservation" style="font-family: Georgia, serif;">Reserver</a>
              </li>

              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
</header>










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