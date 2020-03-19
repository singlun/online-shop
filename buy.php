<?php 
	include("includes/db.php");
	include("includes/chklogin.php");
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
				var buy_xmlhttp = new XMLHttpRequest();				
				buy_xmlhttp.onreadystatechange = function(){
					if (buy_xmlhttp.readyState == 4 && buy_xmlhttp.status == 200 ){
						var receiver = document.getElementById('order');
						receiver.innerHTML = buy_xmlhttp.responseText;
					}
				}						
				buy_xmlhttp.open('GET','load_buy_page.php',true);
				buy_xmlhttp.send();
			}		
			
		
			function Amend_func(item_id, mode, user_input){
				//alert('order.php?delete_ref_id='+ ref_id + '&chk_item_id='+ item_id);
				var xmlhttp = new XMLHttpRequest();				
				xmlhttp.onreadystatechange = function(){
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
						var receiver = document.getElementById('order');
						receiver.innerHTML = xmlhttp.responseText;
						
					}
				}
				xmlhttp.open('GET','load_buy_page.php?mode='+mode+'&chk_item_id='+ item_id +'&chk_qty=' + user_input,true);
				xmlhttp.send();
			}
			
			function checkout_func(){
				//alert('order.php?delete_ref_id='+ ref_id + '&chk_item_id='+ item_id);
				var xmlhttp = new XMLHttpRequest();				
				xmlhttp.onreadystatechange = function(){
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
						var receiver = document.getElementById('order');
						receiver.innerHTML = xmlhttp.responseText;
						
					}
				}
				xmlhttp.open('GET','load_order_page.php?mode=C',true);
				xmlhttp.send();
			}			
			
			/*function update_func(ref_id, item_id){
				//alert('order.php?delete_ref_id='+ ref_id + '&chk_item_id='+ item_id);
				var upd_xmlhttp = new XMLHttpRequest();				
				upd_xmlhttp.onreadystatechange = function(){
					if (upd_xmlhttp.readyState == 4 && upd_xmlhttp.status == 200 ){
						var receiver = documento.getElementById('order_detail');
						receiver.innerHTML = upd_xmlhttp.responseText;
					}
				}		
				
				upd_xmlhttp.open('GET','order.php?udate_ref_id='+ ref_id + '&chk_user_id='+ user_id + '&chk_item_id='+ item_id,true);
				upd_xmlhttp.send();
				//alert('finish');
				//window.location.replace('buy.php?chk_item_id='+ item_id);
				//window.location.assign('buy.php?chk_item_id='+ item_id");
			}	*/		
		</script>

		
	</head>
	<body onload="load_func()">
		<?php include 'includes/header.php'; ?>
		<div class="container" id="order"></div>
		<br><br><br><br><br>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>