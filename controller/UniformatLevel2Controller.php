<?php


include "../view/head.inc.php";
include "dbConnection.php";
include "../model/UniformatLevel2.class.php";
include "../model/UniformatLevel2Manager.class.php";

$floorMgr = new FloorManager();



	$id = "";
    $level1_id = $_POST['level1_id'];
	$name = $_POST['name'];
	

	$Uniformat2 = new Uniformat2($id, $level1_id, $name);   
            #calling Floor class

    $Uniformat2Mgr->addUniformatLevel2( $Uniformat2 );



    header( "location: ../view/floor.php" );




?>