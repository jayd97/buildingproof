<?php

class TenantManager extends DBManager {

    public function addTenent(Tenant $tenant) {
    $query = $this->db->prepare(
    "INSERT INTO tenant (
        property_id, unit_id, property_manager, name, age, gender, occupation, date_of_birth, contact_number, email, 
        base_rent, taxes, insurance, maintenance, additional_charges, net_payable, lease_cycle, lease_starting_date, status
    ) VALUES (
        :property_id, :unit_id, :property_manager, :name, :age, :gender, :occupation, :date_of_birth, :contact_number, :email, 
        :base_rent, :taxes, :insurance, :maintenance, :additional_charges, :net_payable, :lease_cycle, :lease_starting_date, :status
       
    );"
);
 return $query->execute( array(
             
        'property_id' => $tenant->getProperty_ID(),
        'unit_id'=> $tenant->getunit_id(),
        'property_manager'=>$tenant->getPropertyManager(),
        'name'=> $tenant->getName(),
        'age'=> $tenant->getAge(),
        'gender'=> $tenant->getGender(),
        'occupation' => $tenant->getOccupation(),
        'date_of_birth' => $tenant->getDateOfBirth(),
        'contact_number' => $tenant->getContactNumber(),
        'email' => $tenant->getEmail(),
        'base_rent' => $tenant->getBaseRent(),
        'taxes' => $tenant->getTaxe(),
        'insurance' => $tenant->getInsurance(),
        'maintenance' => $tenant->getMaintenance(),
        'additional_charges' => $tenant->getAdditionalCharges(),
        'net_payable' => $tenant->getNetPayable(),
        'lease_cycle' => $tenant->getLeaseCycle(),
        'lease_starting_date' => $tenant->getLeaseStartingDate(),
        'status' => $tenant->getstatus(),
        
        
            ) );
}

   public function editTenant(Tenant $tenant) {
        $query = $this->db->prepare(
            "UPDATE `tenant` SET
                property_id = :property_id, unit_id = :unit_id, property_manager= :property_manager, name = :name, age = :age, gender= :gender, 
                occupation = :occupation, date_of_birth = :date_of_birth, contact_number = :contact_number, email = :email, 
                base_rent = :base_rent, taxes = :taxes, insurance = :insurance, maintenance = :maintenance, additional_charges = :additional_charges, 
                net_payable = :net_payable, lease_cycle= :lease_cycle, lease_starting_date = :lease_starting_date, status = :status
            WHERE `id` = :id;"
        );

       return $query->execute( array(

             
        'property_id' => $tenant->getProperty_ID(),
        'unit_id'=> $tenant->getunit_id(),
        'property_manager'=> $tenant->getPropertyManager(),
        'name'=> $tenant->getName(),
        'age'=> $tenant->getAge(),
        'gender'=> $tenant->getGender(),
        'occupation' => $tenant->getOccupation(),
        'date_of_birth' => $tenant->getDateOfBirth(),
        'contact_number' => $tenant->getContactNumber(),
        'email' => $tenant->getEmail(),
        'base_rent' => $tenant->getBaseRent(),
        'taxes' => $tenant->getTaxe(),
        'insurance' => $tenant->getInsurance(),
        'maintenance' => $tenant->getMaintenance(),
        'additional_charges' => $tenant->getAdditionalCharges(),
        'net_payable' => $tenant->getNetPayable(),
        'lease_cycle' => $tenant->getLeaseCycle(),
        'lease_starting_date' => $tenant->getLeaseStartingDate(),
        'status' => $tenant->getstatus(),
        
       

            ) );
    }

    public function deleteTenant($tenantID) {
        $query = $this->db->prepare("DELETE FROM `unit` WHERE `id` = :id;");
        return $query->execute(['id' => $tenantID]);
    }

    private function getTenantParams(Tenant $tenant) {
        return [
            'id' => $tenant->getID(),
            'property_id' => $tenant->getProperty_ID(),
            'unit_id'=> $tenant->getunit_id(),
            'property_manager'=> $tenant->getPropertyManager(),
            'name'=> $tenant->getName(),
            'age'=> $tenant->getAge(),
            'gender'=> $tenant->getGender(),
            'occupation' => $tenant->getOccupation(),
            'date_of_birth' => $tenant->getDateOfBirth(),
            'contact_number' => $tenant->getContactNumber(),
            'email' => $tenant->getEmail(),
            'base_rent' => $tenant->getBaseRent(),
            'taxes' => $tenant->getTaxe(),
            'insurance' => $tenant->getInsurance(),
            'maintenance' => $tenant->getMaintenance(),
            'additional_charges' => $tenant->getAdditionalCharges(),
            'net_payable' => $tenant->getNetPayable(),
            'lease_cycle' => $tenant->getLeaseCycle(),
            'lease_starting_date' => $tenant->getLeaseStartingDate(),
            'status' => $tenant->getstatus(),
            
        ];
    }
}
?>