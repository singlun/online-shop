<?php
					$_SESSION['u_id'] = "false";
					$_SESSION['mode'] = "L";
					$_SESSION['chk_qty'] = 0;	
	header("Location: login.php?logout=yes", true, 301);
	exit();
?>