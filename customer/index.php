<?php
	require('../core/init.php');
	 if(isset($_SESSION['customer']) AND !empty($_SESSION['customer'])){
	 	header('location: dashboard');
	 }else{
	 	header('location: welcome');
	 }
?>
