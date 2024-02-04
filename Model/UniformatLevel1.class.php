<?php
class Uniformat1 {
    private $id; 
    private $name;
    
    public function __construct($id, $name){
        $this->id = $id ?? null;
        $this->name = $name;
    }

    // getters and setters

    public function getID()
	{
	    return $this->id;
	}
    public function setID($id)
	{
	    $this->id = $id;
	    return $this;
	}

    public function getName()
	{
	    return $this->name;
	}
    public function setName($name)
    {
        $this->name=$name;
        return $this;

    }
}






?>