<?php
class Errors extends Controller {
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->msg = "Page not found";
		$this->view->render('errors/index');
	}
}