<?php
class Errors extends Controller {
	function __construct() {
		parent::__construct();
		echo "Errors bad.... kkkkk?";
		
		$this->view->msg = "Page not found";
		$this->view->render('errors/index');
	}
}