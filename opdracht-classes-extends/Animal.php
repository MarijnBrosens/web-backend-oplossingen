<?php 

class Animal
{
	protected $name;
	protected $gender;
	protected $health;
	
	//constructor kent de parameter-waarden toe aan de class members
	function __construct($name,$gender,$health)
	{
		$this->name 	= $name;
		$this->gender 	= $gender;
		$this->health 	= $health;
	}

	//Returnt de class member $name
	public function getName()
	{
		return $this->name;
	}

	//Returnt de class member $gender
	public function getGender()
	{
		return $this->gender;
	}

	//Returnt de class member $health
	public function getHealth()
	{
		return $this->health;
	}

	//Telt de parameter-waarde op bij de class member $health
	//De waarde van $healthPoints kan zowel positief als negatief zijn.
	public function changeHealth($healthPoints)
	{
		$this->health += $healthPoints;

		return $this->health;
	}

	//Returnt de string 'walk'
	public function doSpecialMove()
	{
		return 'walk';
	}
}

 ?>