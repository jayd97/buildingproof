<?php
class AddContact{
    private $id; 
    private $name; 
    private $email; 
    private $contact_number; 
    private $occupation; 
    private $maintenance; 
    private $archive; 
    private $status; 

    public function __construct($id, $name, $email, $contact_number, $occupation, $maintenance, $archive, $status){
        $this->id 	        = $id ?? null;
			$this->name= $name;
			$this->email	= $email;
			$this->contact_number 		= $contact_number ;
            $this->occupation  	= $occupation;
            $this->maintenance  	= $maintenance;
            $this->archive  	= $archive;
            $this->status  	= $status;


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