<?php

class Register extends Controller {
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		
		$this->view->msg = "Login or we will find you";
		$this->view->render('register/index');
	}
	
	function register() {
		$this->model->register();
	}
}