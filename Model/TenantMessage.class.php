<?php
class TenantMessage{
    private $id; 
    private $tenant_id; 
    private $tenant_name; 
    private $message; 
    private $date; 

    public function __construct($id, $tenant_id, $tenant_name, $message, $date){
        $this->id 	        = $id ?? null;
			$this->tenant_id= $tenant_id;
			$this->tenant_name  	= $tenant_name;
			$this->message 		= $message ;
            $this->date  	= $date;

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
    public function getTenantId()
	{
	    return $this->tenant_id;
	}
	
	public function setTenantId($tenant_id)
	{
	    $this->tenant_id = $tenant_id;
	    return $this;
	}
    public function getTenantName()
	{
	    return $this->tenant_name;
	}
	
	public function setTenantName($tenant_name)
	{
	    $this->tenant_name = $tenant_name;
	    return $this;
	}

    public function getMessage()
	{
	    return $this->message;
	}
	
	public function setMessage($message)
	{
	    $this->message = $message;
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
}


?>