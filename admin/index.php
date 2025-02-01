<?php
	 if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
	 	header('location: dashboard');
	 }else{
	 	header('location: login');
	 }
?>
