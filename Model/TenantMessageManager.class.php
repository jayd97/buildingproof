<?php
class TenantMessageManager extends DBManager{
    public function addTenentMessage(TenantMessage $tenantMessage){
        $query = $this->db->prepare(
            "INSERT INTO tenantmessage (
                tenant_id, tenant_name, message, date
            ) VALUES (
                :tenant_id, :tenant_name, :message, :date
               
            );"
        );
         return $query->execute( array(
                     
                'tenant_id' => $tenantMessage->getTenantId(),
                'tenantt_name'=> $tenantMessage->getTenantName(),
                'message'=> $tenantMessage->getMessage(),
                'date'=> $tenantMessage->getDate(),
                
                
                    ) );

    }

}

?>