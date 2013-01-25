<?php

class Login extends Controller {
	function __construct() {
		parent::__construct();
		echo 'we are in index';

		$this->view->msg = "Welcome!";
		$this->view->render('login/index');
	}
}