<?php

/**
 * 
 * Creates student new student object.
 * @author aczietlow
 *
 */
class Student {
	public $firstName;
	public $lastName;
	public $age;
	
	/**
	 * 
	 * Constructor for student object
	 * @param String $firstName
	 * @param String $lastName
	 * @param int $age
	 */
	function __construct($firstName, $lastName, $age) {
		$this->firstName	= $firstName;
		$this->lastName		= $lastName;
		$this->age			= $age;
	}
	
	/**
	 * 
	 * Get student Name
	 */
	function getName() {
		return "($this->lastName)" . " " . "($this->firstName)";
	}

}

class Classes {
	public $name;
	public $instructor;
	public $numberOfSeats;
	public $courseCode;

	function __construct($name, $instructor, $numberOfSeats, $courseCode) {
		$this->name 			= $name;
		$this->instructor 		= $instructor;
		$this->numberOfSeats	= $numberOfSeats;
		$this->courseCode		= $courseCode;
	}
}




//Everything below here needs to be put in a class
echo "
*********************************************************************
Welcom to the Gradebook program! Please select an action below 

1- Add a new student
2- Add a new Class

*********************************************************************
";

$input = fgets(STDIN);


echo "You selected option $input";
/*
$student 	= new Student("Ryan", "Wagner", 20);
$class1 	= new Classes("Introduction to Algorithms", "Chris Zietlow", 25, "CSC105" );
$class2 	= new Classes("Software Engineering Concepts", "Wayne Fuller", 23, "CSC101");
$class3 	= new Classes("Discrete Mathematics", "Chris Zietlow", 30, "MTH150");
*/

?>
