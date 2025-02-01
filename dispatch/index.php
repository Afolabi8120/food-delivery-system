<?php
	require('../core/init.php');
	 if(isset($_SESSION['dispatch']) AND !empty($_SESSION['dispatch'])){
	 	header('location: dashboard');
	 }else{
	 	header('location: welcome');
	 }
?>
