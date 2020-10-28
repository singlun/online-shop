<?php

		session_start();

		$_SESSION['loginSucess'] = "false";


		if (isset($_REQUEST[u_name]) && isset($_REQUEST[u_password])) {	
			$sql = "select u_id, login_name  from users where login_name = '$_REQUEST[u_name]' and password = '$_REQUEST[u_password]'";
			$run = mysqli_query($conn , $sql);
			$rows = mysqli_fetch_assoc($run);
			if ($rows['u_id'] > 0) {
				if (date_default_timezone_set('UTC')) {
					$_SESSION['u_id'] = $rows['u_id'];
					$date =  date('Y-m-d h:i:s');
					$rand_num = mt_rand();
					$_SESSION['ref'] = $date.'_'.$rand_num;
					$_SESSION['date'] = $date;
					$_SESSION['chk_qty'] = 0;
					$_SESSION['username'] = $rows['login_name'];
					$_SESSION['loginSucess'] = "true";
				}
			}
			else {
				header("Location: http://localhost/online-shop/login.php");
				die();
			}
		}
		else {
			header("Location: http://localhost/online-shop/login.php");
			die();
		}

?>