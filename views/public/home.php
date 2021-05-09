
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuyCar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/templatePublic.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid"> 
       <a href="index.php" class="  col-3 " style="text-decoration:none">
        <img src="./assets/images/logo.png" alt="" width="90">
        <p class="d-inline h1 text-white" style="font-family: Georgia, serif;">URBAN-
        <p class="d-inline h1 text-danger" style="font-family: Georgia, serif;">SOCCER</p>
         </p> </a>
          <div class="collapse navbar-collapse " style="margin-left: 600px;" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item m-2 h4 col-5">
                <a class="nav-link active" aria-current="page" href="index.php?action=accueil" style="font-family: Georgia, serif;">Accueil</a>
              </li>
              <li class="nav-item m-2 h5 col-5">
                <a class="nav-link border border-success" href="index.php?action=login_client" style="font-family: Georgia, serif;">Se connecter</a>
              </li>
              <li class="nav-item m-2 h5 col-4">
                <a class="nav-link border border-success" href="index.php?action=inscription_client" style="font-family: Georgia, serif;">Inscription</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</header>

<div class=" bg-light p-5" style="background-image: url(./assets/images/rrr.jpeg) ;background-size:cover; height:2000px">
<main class="bg-light container " >
        <div class=" col-12  bg-light " style="height:500px;">
            <div class="row">
                <div class=" p-4 col-5 mt-5 offset-1">
                     <img src="./assets/images/logo.png" alt="" style="width:400px">
                </div>
                <div class="p-4 col-6 text-center mt-5  text-DARK">
                    <h1 style="font-family: Georgia, serif; font-size:100px" >
                    URBAN
                    <p class="text-danger d-inline">SOCCER</p>
                    </h1>
                </div>
            </div>
        </div>
  </main>

<div class="container  mb-5"style="margin-top:100px" >
  
        <div class=" col-12   " style="height:400px; " > 
            <div class="row">

                <div class=" col-6 ">
                <img src="./assets/images/art1.jpg" alt="" style="width:660px">
                </div>
                <div class=" col-6 ">
                <img src="./assets/images/art22.png" alt="" style="width:662px">
                </div>
            </div>
        </div>
</div>

<div class=" container bg-dark" style="height:500px; margin-top:250px">
    <div class="row offset-1 ">

        <div class=" col-3 mt-5 ">
              <img src="./assets/images/it.jpg" alt="" style="width:175px">

              <p class="text-white p-2 col-6 text-center border border-light offset-1 mt-5">INFORMATIQUE</p>
        </div>

        <div class=" col-3 mt-5">
              <img src="./assets/images/por.jpg" alt="" style="width:190px">
              <p class="text-white col-5 p-2 text-center border border-light offset-1 mt-5">SPORT</p>

        </div>

        <div class=" col-3 mt-5">
              <img src="./assets/images/popo.jpg" alt="" style="width:190px">
              <p class="text-white col-5 p-2 text-center border border-light offset-1 mt-5">POLITIQUE</p>

        </div>

        <div class=" col-2 mt-5">
              <img src="./assets/images/music.jpg" alt="" style="width:190px">
              <p class="text-white col-9 p-2 text-center border border-light  offset-1 mt-5">MUSIC</p>

        </div>
    </div>
</div>

</div>

<footer>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
        <a href="index.php"><img src="./assets/images/logo.png" alt="" width="100"></a>

      
          <div class="collapse navbar-collapse text-center" id="navbarSupportedContent" style="margin-left: 400px;">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
              </li>
              <li class="nav-item"> <a class="nav-link active" href="">Conditions générales</a></li>
              <li class="nav-item"><a class="nav-link active" href="">Politique de confidentialité</a></li>
              <li class="nav-item"><a class="nav-link active" href="">FAQ</a></li>
             
          
            </ul>
            <span ><a href="index.php?action=login"class="text-dark" >ADMINISTRATION</a> </span>
            <span class="text-right text-white">Copyright<i class="fa fa-copyright" aria-hidden="true"></i>2021</span> 
        </div>
        </div>
      </nav>
</footer>




<script async src="./assets/js/scriptStripe.js"></script>

<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../assets/js/templatePublic.js"></script>
<script src="../../assets/js/scriptAjax.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js%22%3E"></script>
</body>
</html> 