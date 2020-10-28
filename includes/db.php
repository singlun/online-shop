<?php
	error_reporting(E_ERROR | E_PARSE);

	$server = "127.0.0.1";
	$username = "root";
	$password = "";
	$database = "shopping";

	$conn = mysqli_connect($server, $username, $password,$database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

?>
