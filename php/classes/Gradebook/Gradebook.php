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

	function __construct($name, $instructor, $numberOfSeats) {
		$this->name 			= $name;
		$this->instructor 		= $instructor;
		$this->numberOfSeats	= $numberOfSeats;
		$this->courseCode		= $courseCode;
	}
}

$student 	= new Student("Ryan", "Wagner", 20);
$class1 	= new Classes("Introduction to Algorithms", "Chris Zietlow", 25);
$class2 	= new Classes("Software Engineering Concepts", "Wayne Fuller", 23);
$class3 	= new Classes("Discrete Mathematics", "Chris Zietlow", 30);

$output = $student->getName();

echo $output;

?>