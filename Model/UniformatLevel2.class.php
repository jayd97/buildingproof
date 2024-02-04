<?php
class Uniformat2 {
    private $id; 
    private $level1_id;
    private $name;
    
    public function __construct($id, $level1_id, $name){
        $this->id = $id ?? null;
        $this->level1_id = $level1_id;
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
    public function getLevel1Id()
	{
	    return $this->level1_id;
	}
    public function setLevel1Id($level1_id)
	{
	    $this->id = $level1_id;
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