<?php
 class Help_Model extends Model {
 	function __construct() {
 		parent::__construct();
 		echo "Help model";
 	}
 	//Time until you can go home!
 	function quitTime() {
 		return 10+10;
 	}
 }