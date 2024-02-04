<?php
include "../view/head.inc.php";
include "dbConnection.php";
include "../model/Tenant.class.php";
include "../model/TenantManager.class.php";

$tenantMgr= new TenantManager();

if(isset($_POST['Add_tenent'])){
    $id                   = "";
    $property_id         = intval($_POST['propertyName']);
    $unit_id          = $_POST['unitId'];
    $property_manager = $_Post['property_manager'];
    $name             = $_POST['name'];
    $age          = $_POST['age'];
    $gender             = $_POST['gender'];
    $occupation             = $_POST['occupation'];
    $date_of_birth             = $_POST['date_of_birth'];
    $contact_number             = $_POST['contact_number'];
    $base_rent             = $_POST['base_rent'];
    $taxes             = $_POST['taxes'];
    $insurance            = $_POST['insurance'];
    $maintenance             = $_POST['maintenance'];
    $additional_charges             = $_POST['additionnal_charges'];
    $net_payable            = $_POST['net_payable'];
    $lease_cycle             = $_POST['lease_cycle'];
    $lease_starting_date            = $_POST['lease_starting_date'];
    $status             = $_POST['status'];


    if ( $property_id != null ) {				#add required validations where mandatory fields cant be empty

        $tenant = new Tenant($id, $property_id,$unit_id, $property_manager, $name,$age,$gender,$occupation,$date_of_birth,$contact_number,
        $base_rent,$taxes,$insurance,$maintenance,$additional_charges,$net_payable,$lease_cycle,$lease_starting_date,$status);
        #calling Unit class

        $tenanttMgr->addTenant( $tenant );

        header( "location: ../view/admin_portal.php" );

    }else{

        header( "location: ../view/add_unit.php" );
    }
}else if(isset($_POST['Edit_Tenant'])){

    $id                   = "";
    $property_id         = intval($_POST['propertyName']);
    $unit_id          = $_POST['unitId'];
    $property_manager = $_Post['property_manager'];
    $name             = $_POST['name'];
    $age          = $_POST['age'];
    $gender             = $_POST['gender'];
    $occupation             = $_POST['occupation'];
    $date_of_birth             = $_POST['date_of_birth'];
    $contact_number             = $_POST['contact_number'];
    $base_rent             = $_POST['base_rent'];
    $taxes             = $_POST['taxes'];
    $insurance            = $_POST['insurance'];
    $maintenance             = $_POST['maintenance'];
    $additional_charges             = $_POST['additionnal_charges'];
    $net_payable            = $_POST['net_payable'];
    $lease_cycle             = $_POST['lease_cycle'];
    $lease_starting_date            = $_POST['lease_starting_date'];
    $status             = $_POST['status'];


    if ( $property_id != null ) {				#add required validations where mandatory fields cant be empty

        $tenant = new Tenant($id, $property_id,$unit_id,$property_manager,$name,$age,$gender,$occupation,$date_of_birth,$contact_number,
        $base_rent,$taxes,$insurance,$maintenance,$additional_charges,$net_payable,$lease_cycle,$lease_starting_date,$status);
        #calling Unit class

        $tenanttMgr->EditTenant( $tenant );

        header( "location: ../view/admin_portal.php" );

    }else{

        header( "location: ../view/edit_tenant.php" );
    }

}


?>