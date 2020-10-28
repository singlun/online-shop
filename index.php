<?php

	include("includes/utils.php");	
	include("includes/db.php");


	if (getIfSet($_REQUEST['nologin']) == NULL) { 
		session_start();

		$_SESSION['loginSucess'] = "false";

		if (getIfSet($_REQUEST['u_name']) != NULL) {	
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
	}
	
?>

<html>
	<head>
		<title>Online Shopping</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<?php 
		
			include 'includes/header.php'; 
		
		?>
		<div class="container">
			<div class="row">
			
			<?php	
			
					if (isset($_REQUEST['cat_id'])) {		
						//$sql = "select * from items where item_cat = '$_REQUEST[cat_id]'";
						$sql = "select * from items, item_cat where item_cat = cat_id and item_cat = '$_REQUEST[cat_id]'";
						$run = mysqli_query($conn , $sql);	
					}
					else {
						
						//$sql = "select * from items";
						$sql = "select * from items, item_cat where item_cat = cat_id";
						
						
						$run = mysqli_query($conn , $sql);							
						
					}

					while($rows = mysqli_fetch_assoc($run)){
						
							$discounted_price = $rows['item_cost'] - $rows['item_discount'];
							$title = str_replace(' ','-' ,$rows['item_title']);
							$catname = str_replace(' ','-' ,$rows['cat_name']);
												
							echo  "
								<div class='col-md-3'>
									<div class='col-md-12  single-item noPadding'>
										<div class='top'><img src='$rows[item_image]'></div>
										<div class='bottom'>
											<h3 class='item-title'><a href='product.php?catid=$rows[cat_id]&itemid=$rows[item_id]&title=$title&catname=$catname'>$rows[item_title]</a></h3>
											<div class='pull-right cutted-price text-muted'><del>$ $rows[item_cost]/=</del></div>
											<div class='clearfix'></div>
											<div class='pull-right discounted-price'>$ $discounted_price/=</div>
										</div>
									</div>
								</div>
							";
					}
								
			?>
			</div>
		</div><div class="clearfix"></div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>