<?php


include "../view/head.inc.php";
include "dbConnection.php";
include "../model/UniformatLevel3.class.php";
include "../model/UniformatLevel3Manager.class.php";

$floorMgr = new FloorManager();



	$id = "";
    $level2_id = $_POST['level2_id'];
	$name = $_POST['name'];
	

	$Uniformat3 = new Uniformat3($id, $level2_id, $name);   
            #calling Floor class

    $Uniformat2Mgr->addUniformatLevel3( $Uniformat3 );



    header( "location: ../view/floor.php" );




?>