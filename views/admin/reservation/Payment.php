<?php
ob_start();


var_dump($_POST)
?>



<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');
?>