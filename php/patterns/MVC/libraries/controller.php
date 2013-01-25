<?php

class Controller {
	function __construct() {
		echo "This is the main controller. <br />";
		$this->view = new View();
	}
}