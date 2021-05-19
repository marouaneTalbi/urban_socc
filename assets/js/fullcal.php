<?php 

$dbh = new PDO('mysql:host=localhost; dbname=urban_soccer','root','');
$data = [];

    $sql = "SELECT * FROM reservation order by id_res";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $row) {

        $data[] = array(

            "id_res" => $row['id_res'],
             "id_match" => $row['id_match'],
            "id_client" => $row['id_client'],
            "start" => $row['start'],
            "end" => $row['end'],
        );
    }



    echo json_encode($data);

?>