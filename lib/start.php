<?php
	session_start();
	
	if( isset($_SESSION['name']) ){
		$username = $_SESSION['name'];
	}

	function issession(){
		if(!isset($_SESSION['name'])){
			header('location:http://www.test.com/html/login.php');
			exit;
		}
	}
?>