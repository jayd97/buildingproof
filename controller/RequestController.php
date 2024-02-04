<?php

include "../view/head.inc.php";
include "dbConnection.php";
include "../model/Request.class.php";
include "../model/RequestManager.class.php";

$requestMgr = new RequestManager();


if(isset($_POST['Add_request'])){		

	        $id                   = "";
            $building_components         = ($_POST['building_components']);
            $priority           = $_POST['priority'];
            $type_of_request            = $_POST['type_of_request'];
            $property_id          = $_POST['property_id'];
            $unit_id              = $_POST['unit_id'];

            $filepath   = "RequestImage/" . $_FILES["picture"]["name"];
         

            if(move_uploaded_file($_FILES["picture"]["tmp_name"], $filepath)){

                $picture = $filepath;
            }else{
                $picture = "";
            }
            $date              = $_POST['date'];
            $description_of_problem             = $_POST['description_of_problem'];
            $location              = $_POST['location'];
            $region              = $_POST['region'];
            $status              = $_POST['status'];
            

           



    

		if ( $building_components  != null ) {				#add required validations where mandatory fields cant be empty

			$request = new Request($id, $building_components ,$priority,$type_of_request,$property_id,$unit_id,$picture,
            $date,$description_of_problem ,$Location,$region,$status);
			#calling Unit class

			$requestMgr->addRequest( $request );

			header( "location: ../view/request.php" );

        }else{

            header( "location: ../view/request.php" );
        }

}else if(isset($_POST['Edit_request'])){

                $building_components         = ($_POST['building_components']);
                $priority           = $_POST['priority'];
                $type_of_request            = $_POST['type_of_request'];
                $property_id          = $_POST['property_id'];
                $unit_id              = $_POST['unit_id'];

                $picture= "";
                $date              = $_POST['date'];
                $description_of_problem             = $_POST['description_of_problem'];
                $location              = $_POST['location'];
                $region              = $_POST['region'];
                $status              = $_POST['status'];



    

        if ( $building_components  != null ) {              #add required validations where mandatory fields cant be empty

            $request = new Request($id, $building_components ,$priority,$type_of_request,$property_id,$unit_id,$picture,
            $date,$description_of_problem ,$Location,$region,$status);
            #calling Unit class

            if($unitMgr->editUnit( $unit )){
                header( "location: ../view/unit.php" );
            }


        }else{

            header( "location: ../view/edit_unit.php" );
        }

}



?>