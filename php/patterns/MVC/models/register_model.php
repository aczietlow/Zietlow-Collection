<?php 

class Register_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function register() {
		$sth = $this->db->prepare("SELECT * FROM register WHERE name = :name AND sex = :sex");
		$sth->execute(array(
				':name' => $_POST['name'],
				':sex' => $_POST['sex'],
		));
		$count = $sth->rowCount();
		if ($count > 0) {
			//set message
			echo 'record already exists';
			//header('location: ../register');
		}
		else {
			//set message
			echo 'recorded added';

			$name = $_POST['name'];
			$sex = $_POST['sex'];
			#
			$sth = $this->db->prepare("INSERT INTO `register` (`id`, `name`, `sex`) 
					VALUES (NULL, $name, $sex');");
			$sth->execute();
			header('location: ../register');
		}
	}
}