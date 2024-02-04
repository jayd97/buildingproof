<?php
class Uniformat2 {
    private $id; 
    private $level2_id;
    private $name;
    
    public function __construct($id, $level2_id, $name){
        $this->id = $id ?? null;
        $this->level2_id = $level2_id;
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
    public function getLevel2Id()
	{
	    return $this->level2_id;
	}
    public function setLevel1Id($level2_id)
	{
	    $this->id = $level2_id;
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