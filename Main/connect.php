<?php

	$dbServername='localhost';
	$dbUsername='amitmr_user';
	$dbPassword='Aa123456';
	$dbName='amitmr_users';

	$conn=mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	$utf = $conn->query("SET NAMES 'utf8'");
	
?>
