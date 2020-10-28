<?php
	include("includes/utils.php");
	include("includes/db.php");
	
	session_start();


	if (getIfSet($_REQUEST['chk_item_id']) != NULL) {
		if ($_REQUEST['mode'] == 'I') {
				$chk_sql = "INSERT INTO order_info (u_id, chk_item, chk_qty, chk_ref, order_date  ) VALUES  (" . $_SESSION[u_id] . ", " . $_REQUEST[chk_item_id] . ", " . $_REQUEST[chk_qty] . ", '" . $_SESSION[ref] . "', CURDATE())";
				$chk_run = mysqli_query($conn, $chk_sql);
				$_SESSION['chk_qty'] = 0;
		}
		
		if ($_REQUEST['mode'] == 'U') {
				$chk_sql = "Update order_info set chk_qty = ". $_REQUEST[chk_qty] . " where u_id = '".$_SESSION['u_id']."' and chk_ref = '".$_SESSION['ref']."' and chk_item =".$_REQUEST['chk_item_id'];
				$chk_run = mysqli_query($conn, $chk_sql);
				$_SESSION['chk_qty'] = 0;						
		}

		//$chk_sql = "DELETE FROM checkout where chk_ref = '".$_REQUEST['delete_ref_id']."' and u_id = '".$_SESSION['u_id']."' and chk_item = '".$_REQUEST['chk_item_id']."'";
		if ($_REQUEST['mode'] == 'D') {			
			$chk_sql = "delete from order_info where chk_ref = '" . $_SESSION[ref] . "' and u_id = " . $_SESSION[u_id] . " and chk_item = " . $_REQUEST[chk_item_id];
			$chk_run = mysqli_query($conn, $chk_sql);
		}
		
		//if ($_REQUEST['mode'] == 'U') {
		//	$chk_sql = "Update order_info set chk_qty = " . $_REQUEST['chk_qty'] . " where u_id = '".$_SESSION['u_id']."' and chk_ref = '".$_SESSION['ref']."' and chk_item =".$_REQUEST['chk_item_id'];	
		//}
		
		if ($_REQUEST['mode'] == 'C') {
			$chk_sql = "INSERT INTO checkout (u_id,  chk_ref, chk_item, chk_qty, order_date) SELECT u_id,  chk_ref, chk_item, chk_qty, order_date FROM order_info where u_id = ".$_SESSION['u_id']." and chk_ref = '".$_SESSION['ref']."' and chk_item =".$_REQUEST['chk_item_id']."'";	
			$chk_run = mysqli_query($conn, $chk_sql);
			//$chk_sql = "Update checkout set chk_qty = $_REQUEST[chk_qty] where u_id = '".$_SESSION['u_id']."' and chk_ref = '".$_SESSION['ref']."' and chk_item =".$_REQUEST['chk_item_id'];	
		}			
		
		
		if ($_REQUEST['mode'] == 'C') {
				$del_sql = "delete from order_info where u_id = ".$_SESSION['u_id']." and chk_ref = '".$_SESSION['ref']."'";
				$chk_run = mysqli_query($conn, $del_sql);
				//echo $del_sql;		
		}		
	}
?>	
