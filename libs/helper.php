<?php 
	session_start();
	function checkLoginStatus(){
		session_start();
		if (!isset($_SESSION['name'])) {
			header('location:index.php');
			
		}
	}
?>