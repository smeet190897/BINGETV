<?php

	include 'dbcon.php';

	$id = $_GET['id'];

	$q = "DELETE FROM `res` WHERE id=$id";
	
	mysqli_query($con,$q);

	header('location:adminpanel.php');

?>