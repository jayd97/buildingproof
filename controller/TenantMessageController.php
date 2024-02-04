<?php 
include "../view/head.inc.php";
include "dbConnection.php";
include "../model/TenantMessage.class.php";
include "../model/TenantMessageManager.class.php";
$tenantMessageMgr= new TenantMessageManager();
if(isset($_POST['Add_tenentMessage'])){
    $id                   = "";
    $tenant_id         = intval($_POST['tenant_id']);
    $tenant_name          = $_POST['tenant_name'];
    $message             = $_POST['message'];
    $date          = $_POST['date'];
   

    if ( $tenant_id != null ) {				#add required validations where mandatory fields cant be empty

        $tenantMessage = new TenantMessage($id, $tenant_id,$tenant_name,$message,$date);
        #calling Unit class

        $tenantMessageMgr->addTenantMessage( $tenantMessage );

        header( "location: ../view/admin_portal.php" );

    }else{

        header( "location: ../view/add_TenantMessage.php" );
    }
}

?>