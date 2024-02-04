<?php
class Inspection{
    private $id;
    private $user_id;
    private $property_id;
    private $address;
    private $propertyType;
    private $landSurface;
    private $buildingSurface;
    private $unitNumber;
    private $floorNumber;
    private $basement;
    private $majorElement;
    private $elementGroup;
    private $description;
    private $observation;
    private $individualElement;
    private $action;
    private $location;
    private $cost;
    private $term;
    private $image1;
    private $image2;
    private $conclusion;
    private $inspector;
    private $dateOfInspection;
    private $status;

            public function __construct( $id, $user_id, $property_id, $address, $propertyType, $landSurface, $buildingSurface,
            $unitNumber, $floorNumber, $basement, $majorElement, $elementGroup, $description, $observation, $individualElement,
            $action, $location, $cost, $term, $image1, $image2, $conclusion, $inspector, $dateOfInspection,
            $status)
            {
                $this->id= $id ?? null;
                $this->user_id= $user_id;
                $this->property_id= $property_id;
                $this->address= $address;
                $this->propertyType = $propertyType;
                $this->landSurface=$landSurface;
                $this->buildingSurface = $buildingSurface;
                $this->unitNumber = $unitNumber;
                $this->floorNumber = $floorNumber;
                $this->basement= $basement;
                $this->majorElement = $majorElement;
                $this->elementGroup = $elementGroup;
                $this->description = $description;
                $this->observation=$observation;
                $this->individualElement= $individualElement;
                $this->action = $action;
                $this->location=$location;
                $this->cost= $cost;
                $this->term =$term;
                $this->image1 =$image1;
                $this->image1=$image2;
                $this->conclusion = $conclusion;
                $this->inspector=$inspector;
                $this->dateOfInspection =$dateOfInspection;
                $this->status=$status;


            }
            // GETTERS AND SETTERS

            public function getID()
            {
                return $this->id;
            }
            
            public function setID($id)
            {
                $this->id = $id;
                return $this;
            }

            public function getUserId()
            {
                return $this->user_id;
            }
            
            public function setUserId($user_id)
            {
                $this->user_id = $user_id;
                return $this;
            }

            public function getPropertyId()
            {
                return $this->property_id;
            }
            
            public function setPropertyId($property_id)
            {
                $this->property_id = $property_id;
                return $this;
            }

            public function getAddress()
            {
                return $this->address;
            }
            
            public function setAddress($address)
            {
                $this->address = $address;
                return $this;
            }

            public function getPropertyType()
            {
                return $this->propertyType;
            }
            
            public function setPropertyType($propertyType)
            {
                $this->propertyType = $propertyType;
                return $this;
            }
            public function getLandSurface()
            {
                return $this->landSurface;
            }
            
            public function setLandSurface($landSurface)
            {
                $this->landSurface = $landSurface;
                return $this;
            }

            public function getBuildingSurface()
            {
                return $this->buildingSurface;
            }
            
            public function setBuildingSurface($buildingSurface)
            {
                $this->buildingSurface = $buildingSurface;
                return $this;
            }

            public function getUnitNumber()
            {
                return $this->unitNumber;
            }
            
            public function setUnitNumber($unitNumber)
            {
                $this->unitNumber = $unitNumber;
                return $this;
            }

            public function getFloorNumber()
            {
                return $this->floorNumber;
            }
            
            public function setFloorNumber($floorNumber)
            {
                $this->floorNumber = $floorNumber;
                return $this;
            }

            public function getBasement()
            {
                return $this->basement;
            }
            
            public function setBasement($basement)
            {
                $this->basement = $basement;
                return $this;
            }

            public function getMajorElement()
            {
                return $this->majorElement;
            }
            
            public function setMajorElement($majorElement)
            {
                $this->majorElement = $majorElement;
                return $this;
            }

            public function getElementGroup()
            {
                return $this->elementGroup;
            }
            
            public function setElementGroup($elementGroup)
            {
                $this->elementGroup = $elementGroup;
                return $this;
            }

            public function getDescription()
            {
                return $this->description;
            }
            
            public function setDescription($description)
            {
                $this->description = $description;
                return $this;
            }

            public function getObservation()
            {
                return $this->observation;
            }
            
            public function setObservation($observation)
            {
                $this->observation = $observation;
                return $this;
            }

            public function getIndividualElement()
            {
                return $this->individualElement;
            }
            
            public function setIndividualElement($individualElement)
            {
                $this->individualElement = $individualElement;
                return $this;
            }

            public function getAction()
            {
                return $this->action;
            }
            
            public function setAction($action)
            {
                $this->action = $action;
                return $this;
            }

            public function getLocation()
            {
                return $this->location;
            }
            
            public function setLocation($location)
            {
                $this->location = $location;
                return $this;
            }

            public function getCost()
            {
                return $this->cost;
            }
            
            public function setCost($cost)
            {
                $this->cost = $cost;
                return $this;
            }

            public function getTerm()
            {
                return $this->term;
            }
            
            public function setTerm($term)
            {
                $this->term = $term;
                return $this;
            }

            public function getImage1()
            {
                return $this->image1;
            }
            
            public function setImage1($image1)
            {
                $this->image1 = $image1;
                return $this;
            }

            public function getImage2()
            {
                return $this->image2;
            }
            
            public function setImage2($image2)
            {
                $this->image2 = $image2;
                return $this;
            }

            public function getConclusion()
            {
                return $this->conclusion;
            }
            
            public function setConclusion($conclusion)
            {
                $this->conclusion = $conclusion;
                return $this;
            }

            public function getInspector()
            {
                return $this->inspector;
            }
            
            public function setInspector($inspector)
            {
                $this->inspector = $inspector;
                return $this;
            }

            public function getDateOfInspection()
            {
                return $this->dateOfInspection;
            }
            
            public function setDateOfInspection($dateOfInspection)
            {
                $this->dateOfInspection = $dateOfInspection;
                return $this;
            }

            public function getStatus()
            {
                return $this->status;
            }
            
            public function setStatus($status)
            {
                $this->status = $status;
                return $this;
            }








    
        
    }
    

    




?>