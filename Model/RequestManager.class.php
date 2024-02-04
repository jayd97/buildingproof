<?php

class RequestManager extends DBManager {

    public function addRequest(Request $request) {
    $query = $this->db->prepare(
    "INSERT INTO request (
        building_components, priority,type_of_request, property_id, unit_id, picture, date, description_of_problem, 
        location, region, status
    ) VALUES (
        :building_components, :priority, :type_of_request, :property_id, :unit_id, :picture, :date, :description_of_problem, 
        :location, :region, :status
       
    );"
);
 return $query->execute( array(
             
        'building_components' => $request->getBuildingComponents(),
        'priority'=> $request->getPriority(),
        'type_of_request'=> $request->getTypeOfRequest(),
        'property_id'=> $request->getPriorityId(),
        'unit_id'=> $request->getUnitId(),
        'picture' => $request->getPicture(),
        'date' => $request->getDate(),
        'description_of_problem' => $request->getDescriptionOfProblem(),
        'location' => $request->getLocation(),
        'region' => $request->getRegion(),
        'status' => $request->getStatus(),
       
        
        
            ) );
}

   public function editRequest(Request $request) {
        $query = $this->db->prepare(
            "UPDATE `request` SET
                building_components = :building_components, priority = :priority, type_of_request = :type_of_request, property_id = :property_id, unit_id= :unit_id, 
                picture = :picture, date= :date, description_of_problem  = :description_of_problem, location = :location, 
                region = :region,status = :status
            WHERE `id` = :id;"
        );

       return $query->execute( array(

             
        'building_components' => $request->getBuildingComponents(),
        'priority'=> $request->getPriority(),
        'type_of_request'=> $request->getTypeOfRequest(),
        'property_id'=> $request->getPriorityId(),
        'unit_id'=> $request->getUnitId(),
        'picture' => $request->getPicture(),
        'date' => $request->getDate(),
        'description_of_problem' => $request->getDescriptionOfProblem(),
        'location' => $request->getLocation(),
        'region' => $request->getRegion(),
        'status' => $request->getStatus(),
        
       

            ) );
    }

    public function deleteRequest($requestID) {
        $query = $this->db->prepare("DELETE FROM `request` WHERE `id` = :id;");
        return $query->execute(['id' => $requestID]);
    }

    private function getUnitParams(Request $request) {
        return [
            'id' => $request->getID(),
            'building_components' => $request->getBuildingComponents(),
            'priority'=> $request->getPriority(),
            'type_of_request'=> $request->getTypeOfRequest(),
            'property_id'=> $request->getPriorityId(),
            'unit_id'=> $request->getUnitId(),
            'picture' => $request->getPicture(),
            'date' => $request->getDate(),
            'description_of_problem' => $request->getDescriptionOfProblem(),
            'location' => $request->getLocation(),
            'region' => $request->getRegion(),
            'status' => $request->getStatus(),
          
            
        ];
    }
}
?>