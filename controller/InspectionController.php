<?php


include "../view/head.inc.php";
include "dbConnection.php";
include "../model/Inspection.class.php";
include "../model/InspectionManager.class.php";

$inspectionMgr = new InspectionManager();



if(isset($_POST['Add_inspection'])){
    $id                   = "";
    $user_id              = intval($_POST['user_id']);
    $propertyName       = intval($_POST['propertyName']);
    $address              = $_POST['address'];
    $propertyType             = $_POST['propertyType'];
    $landSurface             = $_POST['landSurface'];
    $buildingSurface             = $_POST['buildingSurface'];
    $unitNumber             = $_POST['unitNumber'];
    $floorNumber             = $_POST['floorNumber'];
    $basement             = $_POST['basement'];
    $majorElement             = $_POST['majorElement'];
    $propertyType             = $_POST['propertyType'];
    $elementGroup             = $_POST['elementGroup'];
    $description             = $_POST['description'];
    $observation             = $_POST['observation'];
    $individualElement             = $_POST['individualElement'];
    $action             = $_POST['action'];
    $location             = $_POST['location'];
    $cost             = $_POST['cost'];
    $term             = $_POST['term'];
    $filepath1  = "InspectionImage/" . $_FILES["image1"]["name"];
    $filepath2  = "InspectionImage/" . $_FILES["image2"]["name"];

       #getting file name for image
       if(move_uploaded_file($_FILES["image1"]["tmp_name"], $filepath1)){

        $image1 = $filepath1;
    }else{
        $image1 = "";
    }

    #getting file name for image
    if(move_uploaded_file($_FILES["image2"]["tmp_name"], $filepath2)){

        $image2 = $filepath2;
    }else{
        $image2 = "";
    }
    $conclusion             = $_POST['conclusion'];
    $inspector= $_POST['inspector'];
    $date0fInspection           = $_POST['dateOfInspection'];
    $status             = $_POST['status'];

    
		if ( $propertyName != null ) {				#add required validations where mandatory fields cant be empty

			$inspection = new Inspection($id, $user_id,$propertyName,$address,$propertyType,$landSurface,$buildingSurface,$unitNumber,$floorNumber,$basement,$majorElement,
            $elementGroup,$description,$observation,$individualElement,$action,$location,$cost,$term,$image1,$image2,$conclusion,$inspector,$date0fInspection,$status);
			#calling Unit class

			$inspectionMgr->addInspection( $inspection );

			header( "location: ../view/inspection.php" );
            
        }else{

            header( "location: ../view/add_inspection.php" );
        }
} else if(isset($_POST['Edit_inspection'])){
    $id                   = intval($_POST['inspection_id']); 
    $user_id              = intval($_POST['user_id']);
    $propertyName         = intval($_POST['propertyName']);
    $address              = $_POST['address'];
    $propertyType             = $_POST['propertyType'];
    $landSurface               = $_POST['landSurface'];
    if($landSurface == null){
        $landSurface = 0;
    } 
    $buildingSurface               = $_POST['buildingSurface'];
    if($buildingSurface == null){
        $buildingSurface = 0;
    } 
    $unitNumber           = $_POST['unitNumber'];
    $floorNumber           = $_POST['floorNumber'];
    $basement           = $_POST['basement'];
    $majorElement           = $_POST['majorElement'];
    $elementGroup           = $_POST['elementGroup'];
    $description           = $_POST['description'];
    $observation           = $_POST['observation'];
    $individualElement           = $_POST['individualElement'];
    $action           = $_POST['action'];
    $location           = $_POST['location'];
    $cost           = $_POST['cost'];
    $term           = $_POST['term'];
    $image1 = "";
    $image2 = "";
    $conclusion          = $_POST['conclusion'];
    $inspector         = $_POST['inspector'];
    $date0fInspection           = $_POST['dateOfInspection'];
    $status          = $_POST['status'];

    if ( $propertyName != null ) {				#add required validations where mandatory fields cant be empty

        $inspection = new Inspection($id, $user_id,$propertyName,$address,$propertyType,$landSurface,$buildingSurface,$unitNumber,$floorNumber,$basement,$majorElement,
        $elementGroup,$description,$observation,$individualElement,$action,$location,$cost,$term,$image1,$image2,$conclusion,$inspector,$date0fInspection,$status);
        #calling class

       if ($inspectionMgr->editInspection( $inspection )){
        header( "location: ../view/inspection.php" );
       }

     
        
    }else{

        header( "location: ../view/add_inspection.php" );
    }

}



?>