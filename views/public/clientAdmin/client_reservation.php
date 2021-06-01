<?php
ob_start();
var_dump($_SESSION['Auth_client']);
$data = $_SESSION['Auth_client'];
?>
<script  type="text/javascript">
var x = '<?php echo json_encode($_SESSION['Auth_client']) ?>';
</script>


ok</button>

<div class="container bg-light col-9 card p-3 mt-5"  >
    <h1 class="text-center display-6 font-verdana  mt-3 ">CHOISISSEZ UN TERRAIN</h1>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="index.php?action=payment_cal" method="post" class="text-center" >
                    <div class="row mt-3">
                        <label for="">Terrains</label>
                            <select class="form-select" name="id_match" id="id_match">
                            <option value="">Choisir</option>
                            <?php foreach($matchs as $match){  ?>
                               <option id="op" value="<?php echo $match->getId_match();?>"><button  id="r"><?php echo $match->getMatch_name();?></button></option>
                        <?php }?>
                    </select>
                        <input type="hidden" name="id_client" id="id_client" value="<?php echo $_SESSION['Auth_client']->id?>">
                        <input type="hidden" name="prix" id="prix" value="">
                        <input type="hidden" name="firstname" id="firstname" value="<?php echo$_SESSION['Auth_client']->firstname ?>">
                        <input type="hidden" name="name" id="name" value="<?php echo$_SESSION['Auth_client']->name ?>">
                        <input type="hidden" name="email" id="email" value="<?php echo$_SESSION['Auth_client']->email ?>">
                        <div class="container mt-2" >
                            <div  id="calendar"></div>
                        </div>
                    </div>
                <button type="submit" id="submit" class="btn btn-warning  col-12 mt-3" id="submit" name="submit">Ajout</button>
            </form>
        </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>
<!-- <script async  src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>  -->
<!-- <script async  src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script> -->
<script async  src="./assets/js/CalendarClient.js"></script>
<script async  src="http://fullcalendar.io/js/fullcalendar-2.3.1/lang-all.js"></script>

