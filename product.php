<?php
	include("includes/db.php");
	include("includes/chklogin.php");
?>
<html>
	<head>
		<title>Product detail</title>
		
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>		
		<script>
		
			function buy_func(item_id, mode, qty){
			   /* var xmlhttp = new XMLHttpRequest();					
				xmlhttp.onreadystatechange = function(){
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
						//var receiver = document.getElementById('order_detail');
						//receiver.innerHTML = p_xmlhttp.responseText;
					}
					alert(xmlhttp.readyState);
				}												
				xmlhttp.open('GET','order.php?chk_item_id=' + item_id,true);
				xmlhttp.send();*/
				var querystring = 'chk_item_id=' + item_id + '&mode=' + mode +  '&chk_qty=' + qty;
				$.get('order.php', querystring, function(data) {
					window.location.replace('buy.php');
				});	
			}		
		
			/*function a_func(item_id){				
			    var xmlhttp = new XMLHttpRequest();					
				xmlhttp.onreadystatechange = function(){
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
						//var receiver = document.getElementById('order_detail');
						//receiver.innerHTML = p_xmlhttp.responseText;
					}
					alert(xmlhttp.readyState);
				}
				
					xmlhttp.open('GET','orders.php?chk_item_id='+ item_id,true);
					xmlhttp.send();

				//window.location.replace('buy.php?chk_item_id='+ item_id);
			}	*/	
		</script>
		
		<style>
			.btn {
				font-size: 40px;
				height: 70px;
			}
		</style>
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		<div></div>
		<div id="order_detail"></div>
		<div class="container">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<?php	
						if (isset($_REQUEST['itemid'])) {	
							$catname = str_replace('-',' ' ,$_REQUEST['catname']);
							$title = str_replace('-',' ' ,$_REQUEST['title']);
							echo "<li><a href='index.php?cat_id=".$_REQUEST['catid']."'>$catname</a></li>";
							echo "<li class='active'>$title</li>";	
						}
					?>
				</ol>
			</div>
			
			<div class="row">
			
			<?php
			
			//echo $_REQUEST['itemid'];
			
			
				if (isset($_REQUEST['itemid'])) {	
						$sql_query = "select * from items  where item_id = ". $_REQUEST['itemid'];						
						$sql_result = mysqli_query($conn , $sql_query);	
						$results = mysqli_fetch_assoc($sql_result);	
						$sql_chk_query = "select SUM(chk_qty) from checkout  where chk_item = ". $_REQUEST['itemid'] . " group by chk_item, u_id" ;
						//echo $sql_chk_query;
						$sql_chk_result = mysqli_query($conn , $sql_chk_query);	
						$chk_results = mysqli_fetch_assoc($sql_chk_result);	

						if (isset($chk_results['chk_qty'])) {
							$mode = "U";							
						}
						else {
							$mode = "I";						
						}
						
						if ($chk_results['chk_qty'] == null) {
							$chk_qty= 1;
						} elseif ($chk_results['chk_qty'] == 0) {
							$chk_qty= 0;
						}
						else {
							$chk_qty = $chk_results['chk_qty'] + 1;	
						}

						//echo  $_SESSION['chk_qty'];
									
						
							echo "		
									<div class='col-md-8'>
										<h3 class='pp-title'>$results[item_title]</h3>
										<img src='$results[item_image]' class='img-responsive'>
										<h4 class='pp-desc-head'>Description</h4>
										<div class='pp-desc-detail'>$results[item_description]</div>
									</div>
								";
				}
				?>	
						<?php $buy_param = strval($_REQUEST['itemid']) . ",'" . $mode . "'," . strval($chk_qty); ?>	
						<aside class="col-md-4">
						<?php 
							if ($chk_qty) {
									
									echo '<button id="btn"  class="btn btn-success btn-lg btn-block" onclick="buy_func(' . $buy_param . ')">Buy</button>';
							} 
							else {
									echo "<button id='btn'  class='btn btn-danger btn-lg btn-block'>Out Of Stock</button>";
							}
						?>

							<br>
							<ul class="list-group">
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-3"><i class="fa fa-truck fa-2x"></i></div>
										<div class="col-md-9">Delivered within 5 days</div>
									</div>
								</li>
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-3"><i class="fa fa-refresh fa-2x"></i></div>
										<div class="col-md-9">Easy return in 7 days</div>
									</div>
								</li>
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-3"><i class="fa fa-phone fa-2x"></i></div>
										<div class="col-md-9">Call at 123456789</div>
									</div>
								</li>
							</ul>
						</aside>	
			</div>		
			<div class="page-header">
				<h2>Related Items</h2>
			</div>
			<section class="row">
				<?php
						if (isset($_REQUEST['catid'])) {		
							//$sql = "select * from items where item_cat = '$_REQUEST[cat_id]'";
							$sql = "select * from items, item_cat where item_cat = cat_id and item_cat = '$_REQUEST[catid]' and item_id != '$_REQUEST[itemid]'";
							$run = mysqli_query($conn , $sql);	
							
							while($rows = mysqli_fetch_assoc($run)){
							
								$discounted_price = $rows['item_cost'] - $rows['item_discount'];
								$title = str_replace(' ','-' ,$rows['item_title']);
								$catname = str_replace(' ','-' ,$rows['cat_name']);								

								echo "
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
							
							
						}
						

				?>
				
			</section>
		</div><br><br><br><br><br>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>