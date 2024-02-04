<?php
class Lease {
	private $id;
	private $property_id;
	private $unit_id;
    private $owner_id;
	private $phone_number;
	private $landlord_name;
    private $landlord_phone_number;
    private $start_date;
    private $end_date;
    private $monthly_rent;
    private $rent_payment_due_date;
    private $late_payment_penalty;
    private $security_deposit_amount;
    private $security_deposit_due_amount;
    private $lease_term;
    private $lease_termination_notice_period;
    private $termination_fee;
    private $late_move_out_fee;
    private $renewal_option;
    private $renewal_date;
    private $renewal_rent;
    private $renewal_term;
    private $rent_increase_option;
    private $rent_increase_percentage;
    private $rent_increase_date;
    private $status;
   


		public function __construct($id, $property_id, $unit_id, $owner_id, $phone_number, $landlord_name, $landlord_phone_number,
        $start_date, $end_date, $monthly_rent, $rent_payment_due_date, $late_payment_penalty, $security_deposit_amount, $security_deposit_due_amount, 
        $lease_term, $lease_termination_notice_period, $termination_fee, $late_move_out_fee, $renewal_option, $renewal_date, $renewal_rent, 
        $renewal_term, $rent_increase_option, $rent_increase_percentage, $rent_increase_date, $status) {
			$this->id 	        = $id ?? null;
			$this->property_id	= $property_id;
			$this->unit_id   	= $unit_id;
			$this->owner_id 		= $owner_id ;
            $this->phone_number 	= $phone_number;
            $this->landlord_name  	= $landlord_name;
            $this->landlord_phone_number  	= $landlord_phone_number;
            $this->date_of_birth   	= $date_of_birth;
            $this->contact_number  	= $contact_number;
            $this->email   	= $email;
            $this->base_rent   	= $base_rent;
            $this->taxes   	= $taxe;
            $this->insurance   	= $insurance;
            $this->maintenance   	= $maintenance;
            $this->additional_charges   	= $additional_charges;
            $this->net_payable   	= $net_payable;
            $this->lease_cycle   	= $lease_cycle;
            $this->lease_starting_date   	= $lease_starting_date;
			$this->status   	= $status;

		}

	#Getter's & Setter's
	public function getID()
	{
	    return $this->id;
	}
	
	public function setID($id)
	{
	    $this->id = $id;
	    return $this;
	}

	public function getProperty_ID()
	{
	    return $this->property_id;
	}
	
	public function setProperty_ID($property_id)
	{
	    $this->property_id = $property_id;
	    return $this;
	}

	public function getunit_id()
	{
	    return $this->unit_id;
	}
	
	public function setunit_id($unit_id)
	{
	    $this->unit_id = $unit_id;
	    return $this;
	}

	public function getName()
	{
	    return $this->name;
	}
	
	public function setName($name)
	{
	    $this->name = $name;
	    return $this;
	}
    public function getAge()
	{
	    return $this->age;
	}
	
	public function setAge($age)
	{
	    $this->age = $age;
	    return $this;
	}
    public function getGender()
	{
	    return $this->gender;
	}
	
	public function setGender($gender)
	{
	    $this->gender = $gender;
	    return $this;
	}
    public function getOccupation()
	{
	    return $this->occupation;
	}
	
	public function setOccupation($occupation)
	{
	    $this->name = $occupation;
	    return $this;
	}

    public function getDateOfBirth()
	{
	    return $this->date_of_birth;
	}
	
	public function setDateOfBirth($date_of_birth)
	{
	    $this->date_of_birth = $date_of_birth;
	    return $this;
	}
    public function getContactNumber()
	{
	    return $this->contact_number;
	}
	
	public function setCOntactNumber($contact_number)
	{
	    $this->contact_number = $contact_number;
	    return $this;
	}
    public function getEmail()
	{
	    return $this->email;
	}
	
	public function setEmail($email)
	{
	    $this->email = $email;
	    return $this;
	}
    public function getBaseRent()
	{
	    return $this->base_rent;
	}
	
	public function setBaseRent($base_rent)
	{
	    $this->base_rent = $base_rent;
	    return $this;
	}
    public function getTaxe()
	{
	    return $this->taxes;
	}
	
	public function setTaxe($taxes)
	{
	    $this->taxes = $taxes;
	    return $this;
	}

    public function getInsurance()
	{
	    return $this->insurance;
	}
	
	public function setInsurance($insurance)
	{
	    $this->insurance = $insurance;
	    return $this;
	}
    public function getMaintenance()
	{
	    return $this->maintenance;
	}
	
	public function setMaintenance($maintenance)
	{
	    $this->maintenance = $maintenance;
	    return $this;
	}
    public function getAdditionalCharges()
	{
	    return $this->additional_charges;
	}
	
	public function setAdditionalCharges($additional_charges)
	{
	    $this->name = $additional_charges;
	    return $this;
	}
    public function getNetPayable()
	{
	    return $this->net_payable;
	}
	
	public function setNetPayable($net_payable)
	{
	    $this->net_payable = $net_payable;
	    return $this;
	}
    public function getLeaseCycle()
	{
	    return $this->lease_cycle;
	}
	
	public function setLeasseCycle($lease_cycle)
	{
	    $this->lease_cycle = $lease_cycle;
	    return $this;
	}
    public function getLeaseStartingDate()
	{
	    return $this->lease_starting_date;
	}
	
	public function setLeaseStartingDate($lease_starting_date)
	{
	    $this->lease_starting_date = $lease_starting_date;
	    return $this;
	}

	public function getstatus()
	{
	    return $this->status;
	}
   
	public function setstatus($status)
	{
	    $this->status = $status;
	    return $this;
	}

	

	}
?>