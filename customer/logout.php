<?php
	include('../core/init.php');
	unset($_SESSION['customer']);
	header('location: login');

?>