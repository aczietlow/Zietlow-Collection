<?php

class Help extends Controller {
	function __construct() {
		parent::__construct();
		echo 'we are in the help!<br />';
	}
	
	public function other($arg = false) {
		echo 'this is other!<br />';
		echo 'Optional:<br />' . $arg;
		
		require 'models/help_model.php';
		$model = new Help_Model();
	}
}