<?php
include("includes/db.php");

session_start();

if($_SESSION['loginSucess'] != "true") {
	header("Location: http://localhost/online-shop/login.php");
}


	// include("includes/chklogin.php");
?>				
			<div class="page-header">
				<h2 class="text-left">Checkout</h2>
				<p class="text-right"> <button class="btn btn-success" onclick="checkout_func()" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#myModal">Checkout</button></p>			
			</div>				
			<div class="panel panel-default">
				<div class="panel-heading">Order Detail</div>
				<div class="panel-body" id="order_detail">				
						<table class="table">
							<thead>
								<tr>
									<th>S.no</th>
									<th>Item</th>
									<th>qty</th>
									<th width="5%">Delete</th>
									<th class="text-right">Price</th>
									<th class="text-right">Total</th>							
								</tr>    
							</thead>
							<tbody>
									<?php

												$sql = "SELECT a.item_id 'item_id', a.item_qyt , c.chk_ref 'ref_id', c.chk_qty, a.item_title 'item_title', a.item_price 'price', c.chk_qty * a.item_price 'total_price' FROM order_info c, items a WHERE c.u_id = '" . $_SESSION['u_id'] . "' and c.chk_item = a.item_id and c.chk_ref = '" . $_SESSION[ref] . "'";											
																	
												$run = mysqli_query($conn , $sql);	
												$c = 1;
												$order_qty = 1;
												$sub_price = 0;
											
												while($rows = mysqli_fetch_assoc($run)){
																												
																echo "<tr>";
																	echo "<td>$c</td>";
																	echo "<td>$rows[item_title]</td>";
																	echo "<td><input type='number' min='1' max='100' style='width: 50' onblur=\"Amend_func($rows[item_id],'U',this.value)\" value='$rows[chk_qty]'</td>";
																	echo "<td><button class='btn btn-danger btn-sm' onclick=\"Delete_func($rows[item_id])\">Delete</button></td>";
																	echo "<td class='text-right'><b>$rows[price]/=</b></td>";
																	echo "<td class='text-right'><b>$rows[total_price] /=</b></td>";										
																echo "</tr>";
															
														$c++;
														$sub_price = $rows['total_price'] + $sub_price;
												}
									?>							
							</tbody>	
						</table>
						<table class="table">
							<thead>
								<tr>
									<th class="text-center" colspan="2">Order Summary</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Subtotal</td>
									<td class="text-right"><b><?php echo $sub_price?>/=</b></td>
								</tr>
								<tr>
									<td>Delivery Charges</td>
									<td class="text-right"><b>Free</b></td>
								</tr>
								<tr>
									<td>Grand Total</td>
									<td class="text-right"><b><?php echo $sub_price?>/=</b></td>
								</tr>
							</tbody>
						</table>				
				</div>
			</div>
	
