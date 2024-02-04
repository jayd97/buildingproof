<?php


include "../view/head.inc.php";
include "dbConnection.php";
include "../model/UniformatLevel1.class.php";
include "../model/UniformatLevel1Manager.class.php";

$floorMgr = new FloorManager();



	$id = "";
	$name = $_POST['name'];
	

	$Uniformat1 = new Uniformat1($id, $name);   
            #calling Floor class

    $Uniformat1Mgr->addUniformatLevel1( $Uniformat1 );



    header( "location: ../view/floor.php" );




?>