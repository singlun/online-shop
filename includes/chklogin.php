<?php
	  if ($_SESSION['u_id'] == "false") {	
				$_SESSION['u_id'] = "false";
				$_SESSION['mode'] = "L";
				$_SESSION['chk_qty'] = 0;	
				$_SESSION['username'] = "";				
				header("Location: login.php", true, 301);
				exit();				  			 
	  }		
?>