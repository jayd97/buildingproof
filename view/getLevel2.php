<?php
include "../model/DBManager.class.php";
include "../controller/dbConnection.php";


if(isset($_POST['level2'])){
    $query2    = $db2->query( "SELECT*FROM uniformat_level2 WHERE level1_id=".$_POST['level2']);
    $Uniformat2     = $query2->fetchAll( PDO::FETCH_ASSOC );
    echo json_decode($Uniformat2);
}

 ?>
