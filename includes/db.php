<?php

	session_start();
	error_reporting(E_ERROR | E_PARSE);
	//database config
	$server = "xxxx";
	$username = "xxxx";
	$password = "xxxx";
	$database = "xxxxx";
	$conn = mysqli_connect($server, $username, $password,$database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	else {

		  if (($_SESSION['u_id'] == "false") and isset($_REQUEST['u_name'])){
			 //echo "select u_id  from users where login_name = '$_REQUEST[u_name]' and password = '$_REQUEST[u_password]'";
				$sql = "select u_id, login_name  from users where login_name = '$_REQUEST[u_name]' and password = '$_REQUEST[u_password]'";
				$run = mysqli_query($conn , $sql);
				$rows = mysqli_fetch_assoc($run);
				echo $sql;
				if ($rows['u_id'] > 0) {
					if (date_default_timezone_set('UTC')) {
						$_SESSION['u_id'] = $rows['u_id'];
						$date =  date('Y-m-d h:i:s');
						$rand_num = mt_rand();
						$_SESSION['ref'] = $date.'_'.$rand_num;
						$_SESSION['date'] = $date;
						$_SESSION['mode'] = "L";
						$_SESSION['chk_qty'] = 0;
						$_SESSION['username'] = $rows['login_name'];
					}
				}
				else {
					$_SESSION['u_id'] = "false";
					$_SESSION['mode'] = "L";
					$_SESSION['username'] = "";
					$_SESSION['chk_qty'] = 0;
					//echo "db";
					header("Location: login.php?login=fail", true, 301);
					exit();
				}
		  }

	}

?>
