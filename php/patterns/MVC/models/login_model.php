<?php

class Login_Model extends Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function run() {
		
		$sth = $this->db->prepare("SELECT id FROM users 
		WHERE login = :login AND password = MD5(:password)");
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => $_POST['login'],
		));
		
		$data = $sth->fetchAll();
		print_r($data);
	}

}