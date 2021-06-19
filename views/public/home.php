<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban-Soccer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/templatePublic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style1.css"type="text/css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="bg-dark" >
      <header>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <div class="container-fluid"> 
              <a href="index.php" class=" col-3 mt-2" style="text-decoration:none">
              <p class="d-inline h4 text-white" style="font-family: Georgia, serif;">URBAN-
              <p class="d-inline h4 text-danger" style="font-family: Georgia, serif;">SOCCER</p>
              </p> </a>
                <div class="collapse navbar-collapse " style="margin-left:30%;" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item m-2 h5 col-5">
                      <a class="nav-link active" aria-current="page" href="index.php?action=accueil" style="font-family: Georgia, serif;">Accueil</a>
                    </li>
                    <li class="nav-item m-2 h5 col-5">
                      <a class="nav-link active" aria-current="page" href="index.php?action=tournois" style="font-family: Georgia, serif;">Tournois</a>
                    </li>
                    <li class="nav-item m-2 h7 col-4 text-center">
                      <a class="nav-link border border-success" href="index.php?action=login_client" style="font-family: Georgia, serif;">Se connecter</a>
                    </li>
                    <li class="nav-item m-2 h7 col-4 text-center">
                      <a class="nav-link border border-success" href="index.php?action=inscription_client" style="font-family: Georgia, serif;">Inscription</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
      </header>
      <div id="home">
          <div class="row  col-12">
            <div class="col-6 text-center   text-white"id="titre">
                <h1 id="pop"> URBAN<br><p class="text-white d-inline">SOCCER</p></h1>
            </div>
            <div class=" col-6  text-center" id="divRes1">
              <div class="card p-5 d-flex justify-content-center" id="divRes">
               <a id="href" href="index.php?action=login_client" ><h3 >RESERVER MAINTENANT</h3></a>
              </div>
            </div>
          </div>
      </div>
      <div id="tarifClients" class="container ">
          <div class="row offset-1 " id="tarifs">
              <div class=" col-4   text-white card m-1  text-center d-flex justify-content-center p-3" id="infoTarif">
              <p id="paraph"> Tarifs terrains  :<br>
                Du lundi au vendredi de 09h00 à 21H
                Les week-end de 9h00 à 21H
                Vacances scolaires et tous les jours fériés inclus.</p>
              </div>
              <div class=" col-3 m-0 card p-2 text-white text-center m-1 d-flex justify-content-center p-0"id="infoTarif">
                  <h1 class="h1_titre" >NOS TARIFS</h1>
                  <p id="paraph">30 min: 50€</p>
                  <p id="paraph">1h : 100€</p>
                  <p id="paraph">1h30 min: 150€</p>
              </div>
              <div class=" col-4  card text-white  text-center m-1 d-flex justify-content-center offset-1"id="infoTarif">
                  <h1 id="paraph"> PARTICIPEZ A NOS TOURNOIS ET GAGNER JUSQUA 1500€ <br> PAR EQUIPE </h1>
              </div>
          </div>
      </div>
      <div id="terrain" class="row">
          <div id="infoImage" class=" col-6 text-center mt-5">
            <h1><p id="infoP" class="d-inline text-danger ">VISITEZ LE </p><p id="infoP" class="d-inline text-white">CENTRE</p></h1>
            
            <p class="text-white p-5 text-center mt-5" id="infoP2">Votre centre UrbanSoccer met à votre disposition des terrains de foot 5 indoor en synthétique dernière génération, des vestiaires avec douches, un parking et un club house pour vous relaxer après votre match!</p>
            
            <div class="row offset-1  " id="tarifs2">
                  <div class=" col-5  card text-white  text-center m-1 d-flex justify-content-center offset-0"id="infoTarif2">
                  <a id="href" href="index.php?action=login_client" class=" text-white"> <h1 class="h5"> RESERVER EN UN CLICK. </h1></a>
                  </div>
                  <div class=" col-5   text-white card m-1 text-center d-flex justify-content-center " id="infoTarif2">
                  <p  class="textTel">  OU EN APPLANT AU<br> 07 56 98 21 45.</p>
                  </div>
              </div>
          </div>
        <div id="image1" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/images/terrain2.jpg" class="d-block w-100 "  alt="..."></a>
              </div>
              <div class="carousel-item">
               <img src="./assets/images/stars2.jpg" class="d-block w-100" alt="..."></a>
              </div>
              <div class="carousel-item">
                <img src="./assets/images/terrain3.jpg" class="d-block w-100"  alt="..."></a>
              </div>
              <div class="carousel-item">
                <img src="./assets/images/terrain4.jpg" class="d-block w-100"  alt="..."></a>
              </div>
              <div class="carousel-item">
                <img src="./assets/images/terrain5.jpg" class="d-block w-100"  alt="..."></a>
              </div>
            </div>
      </div>
  </div> 


  <footer id="footer" class="bg-dark">
      <div class="footer_info">
          <div class="foo_footer_width about_foo text-center">
              <h2 >About</h2>
                <p>L'UrbanLeague est la référence des championnats de Foot 5. 1 500 équipes pour partager un moment convivial sur le terrain et dans nos Club-House. Tous vos résultats et statistiques sur votre espace dédié MyUrban.</p>
            <div class="foo_social-media ">
                <ul class="foo_ul  offset-3" >
                    <li ><a href="#" class="foo_a" ><i class="fab fa-instagram " ></i></a></li>
                    <li ><a href="#" class="foo_a"><i class="fab fa-facebook" ></i></a></li>
                    <li ><a href="#" class="foo_a"><i class="fab fa-twitter" ></i></a></li>
                </ul>
            </div>
          </div>

        <div class="foo_footer_width link_foo text-center "></div>  
          <div class="foo_footer_width contactt_foo text-center  ">
              <h2 >Contact</h2>
              <ul class="foo_ul text-center col-5 " >
                  <li >
                      <span><i id="footerI" class="fas fa-map-marker" aria-hidden="true"></i></span>
                      <p id="footerItem">75 rue paris 75000</p>
                  </li>
                  <li >
                      <span><i id="footerI" class="far fa-envelope" class="text-white" style="color: white;" aria-hidden="true"></i></span>
                      <a href="#" id="footerItem" class="foo_a">urbain@soccer.net</a>
                  </li>
                  <li >
                      <span><i id="footerI" class="fas fa-phone" aria-hidden="true"></i></span>
                      <a href="#" id="footerItem" class="foo_a">07 56 98 21 45</a>
                  </li>
              </ul>
          </div>
        
      </div>
      <div class="border border-warning col-1 text-center ">
        <a id="href"  href="index.php?action=login">
          ADMIN
        </a>
        </div>
      <div class="foo_copy-right">
        <p>copyright &copy;2021 URBAINSOCCER. designed by Talbi Marouane</p>
     
      </div>
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
<script async src="./assets/js/animation.js"></script>
</div>
</body>
</html> 