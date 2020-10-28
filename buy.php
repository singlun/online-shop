<?php

include("includes/db.php");

session_start();

if($_SESSION['loginSucess'] != "true") {
		header("Location: http://localhost/online-shop/login.php");
	}


	// include("includes/chklogin.php");
?>	
<html>
	<head>
		<title>Shopping Cart</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>	
		<script>
			function load_func(){
				$('#order').load('load_buy_page.php')
			}
			
			function Delete_func(item_id){
				var querystring = 'mode=D&chk_item_id=' + item_id;
				$.get('order.php', querystring, function(data) {
					$('#order').load('load_buy_page.php')
				});	
			}			
			
		
			function Amend_func(item_id, mode, user_input){
				var querystring = 'mode='+mode+'&chk_item_id='+ item_id +'&chk_qty=' + user_input;
				$.get('order.php', querystring, function(data) {
					$('#order').load('load_buy_page.php')
				});	


			}
			
			function checkout_func(item_id){
				var querystring = 'mode=C&chk_item_id=-1';
				$.get('order.php', querystring, function(data) {
					$('#order').load('load_order_page.php')
				});	
			}			
		
		</script>

		
	</head>
	<body onload="load_func()">
		<?php include 'includes/header.php'; ?>
		<div class="container" id="order"></div>
		<br><br><br><br><br>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>