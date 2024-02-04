<?php
class InspectionManager extends DBManager{

   public function addInspection(Inspection $inspection){
    $query = $this->db->prepare(
      "INSERT INTO inspection (
       property_id, address, propertyType, landSurface, buildingSurface, unitNumber, floorNumber, basement, 
    majorElement, elementGroup, description, observation, individualElement, action, location, cost, term,
     image1, image2, conclusion, inspector, dateOfInspection, status,  user_id )
    VALUES (:property_id, :propertyType, :landSurface, :buildingSurface, :unitNumber,
     :floorNumber, :basement, :majorElement, :elementGroup, :description,
    :observation, :individualElement, :action, :location, :cost, :term, :image1,
     :image2, :conclusion, :inspector, :dateOfInspection, :status, :user_id ) ");
    return $query->execute(array(
      
      "property_id" => $inspection->getPropertyId(),
      "address" => $inspection->getAddress(),
      "propertyType" => $inspection->getPropertyType(),
      "landSurface" => $inspection->getLandSurface(),
      "buildingSurface" => $inspection->getBuildingSurface(),
      "unitNumber" => $inspection->getUnitNumber(),
      "floorNumber" => $inspection->getFloorNumber(),
      "basement" => $inspection->getBasement(),
      "majorElement" => $inspection->getMajorElement(),
      "elementGroup" => $inspection->getElementGroup(),
      "description" => $inspection->getDescription(),
      "observation" => $inspection->getObservation(),
      "individualElement" => $inspection->getIndividualElement(),
      "action" => $inspection->getAction(),
      "location" => $inspection->getLocation(),
      "cost" => $inspection->getCost(),
      "term" => $inspection->getTerm(),
      "image1" => $inspection->getImage1(),
      "image2" => $inspection->getImage2(),
      "conclusion" => $inspection->getConclusion(),
      "inspector" => $inspection->getInspector(),
      "dateOfInspection" => $inspection->getDateOfInspection(),
      "status" => $inspection->getStatus(),
      "user_id" => $inspection->getUserId(),

    ));
   }
   

   public function editInspection(Inspection $inspection){
      $query = $this->db->prepare("UPDATE `inspection` SET `user_id`= :user_id, `property_id`= :property_id, `address`= :address, `propertyType`= :propertyType, `landSurface`= :landSurface,
       `buildingSurface`= :buildingSurface, `unitNumber`= :unitNumber, `floorNumber`= :floorNumber, `basement`= :basement, 
       `majorElement`= :majorElement, `elementGroup`= :elementGroup, `description`= :description, `observation`= :observation, `individualElement`= :individualElement,
       `action`= :action, `location`= :location, `cost`= :cost, `term`= :term, `image1`= :image1, `image2`= :image2, `conclusion`= :conclusion, `inspector`= :inspector, 
       `dateOfInspection`= :dateOfInspection, `status`= :status WHERE `id`= :id");
      return $query->execute(array(
        "id"=> $inspection->getID(),
        "user_id" => $inspection->getUserId(),
        "property_id" => $inspection->getPropertyId(),
        "address" => $inspection->getAddress(),
        "propertyType" => $inspection->getPropertyType(),
        "landSurface" => $inspection->getLandSurface(),
        "buildingSurface" => $inspection->getBuildingSurface(),
        "unitNumber" => $inspection->getUnitNumber(),
        "floorNumber" => $inspection->getFloorNumber(),
        "basement" => $inspection->getBasement(),
        "majorElement" => $inspection->getMajorElement(),
        "elementGroup" => $inspection->getElementGroup(),
        "description" => $inspection->getDescription(),
        "observation" => $inspection->getObservation(),
        "individualElement" => $inspection->getIndividualElement(),
        "action" => $inspection->getAction(),
        "location" => $inspection->getLocation(),
        "cost" => $inspection->getCost(),
        "term" => $inspection->getTerm(),
        "image1" => $inspection->getImage1(),
        "image2" => $inspection->getImage2(),
        "conclusion" => $inspection->getConclusion(),
        "inspector" => $inspection->getInspector(),
        "dateOfInspection" => $inspection->getDateOfInspection(),
        "status" => $inspection->getStatus(),
  
      ));
     }
  
     public function deleteInspection($id) {
      $query = $this->db->prepare("DELETE FROM `inspection` WHERE `id` = :id;");
      return $query->execute(['id' => $id]);
  }


}

?>