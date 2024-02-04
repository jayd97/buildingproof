<?php 


class Request{
    private $id;
    private $building_components;
    private $priority;
    private $type_of_request;
    private $property_id;
    private $unit_id;
    private $picture;
    private $date; 
    private $description_of_problem;
    private $location;
    private $region; 
    private $status;
  
  
    public function __construct($id, $building_components, $priority, $type_of_request, $property_id, $unit_id, $picture, $date,
    $description_of_problem, $location, $region, $status){
        $this->id 	        = $id ?? null;
        $this->building_components = $building_components;
        $this->priority = $priority;
        $this->type_of_request = $type_of_request;
        $this->property_id = $property_id;
        $this->unit_id = $unit_id;
        $this->picture = $picture;
        $this->date = $date;
        $this->description_of_problem = $description_of_problem;
        $this->location = $location;
        $this->region = $region;
        $this->status = $status;
}

public function getID()
	{
	    return $this->id;
	}
	
	public function setID($id)
	{
	    $this->id = $id;
	    return $this;
	}
    public function getBuildingComponents()
	{
	    return $this->building_components;
	}
	
	public function setBuildingComponents($building_components)
	{
	    $this->building_components = $building_components;
	    return $this;
	}
    public function getPriority()
	{
	    return $this->priority;
	}
	
	public function setPriority($priority)
	{
	    $this->priority = $priority;
	    return $this;
	}
    public function getTypeOfRequest()
	{
	    return $this->type_of_request;
	}
	
	public function setTypeOfRequest($type_of_request)
	{
	    $this->type_of_request= $type_of_request;
	    return $this;
	}
    public function getPriorityId()
	{
	    return $this->property_id;
	}
	
	public function setPropertyId($property_id)
	{
	    $this->property_id = $property_id;
	    return $this;
	}

    public function getUnitId()
	{
	    return $this->unit_id;
	}
	
	public function setUnitId($unit_id)
	{
	    $this->unit_id = $unit_id;
	    return $this;
	}

    public function getPicture()
	{
	    return $this->picture;
	}
	
	public function setPicture($picture)
	{
	    $this->picture = $picture;
	    return $this;
	}

    public function getDate()
	{
	    return $this->date;
	}
	
	public function setDate($date)
	{
	    $this->date = $date;
	    return $this;
	}
    public function getDescriptionOfProblem()
	{
	    return $this->description_of_problem;
	}
	
	public function setDescriptionOfProblem($description_of_problem)
	{
	    $this->description_of_problem = $description_of_problem;
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
    public function getRegion()
	{
	    return $this->region;
	}
	
	public function setRegion($region)
	{
	    $this->region = $region;
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