<?php
	include("includes/db.php");

	$sql = "INSERT INTO users (u_id,login_name, name, email, address, password, contact_number) VALUES  (null,'$_POST[username]', '$_POST[name]', '$_POST[email]', '$_POST[address]', '$_POST[password]', '$_POST[contactnumber]')";
	$chk_run = mysqli_query($conn, $sql);

	echo "<h5 style='color: #3399ff; text-decoration: none;'>User Registered Successfully.</h5>";
?>	