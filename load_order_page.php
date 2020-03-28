<?php
	include("includes/db.php");
	include("includes/chklogin.php");
?>	
			<div class="page-header">
				<h2 class="text-left">Sucessfully Checkout</h2>		
			</div>				
			<div class="panel panel-default">
				<div class="panel-heading" style="background: #3399ff;color: white"><b>Order Information</b></div>
				<div class="panel-body" id="order_detail">	
				<table class="table">
					<thead>
						<tr>
							<th>S.no</th>
							<th>Item</th>
							<th>qty</th>
							<th class="text-right">Price</th>
							<th class="text-right">Total</th>							
						</tr>    
					</thead>
					<tbody>
							<?php

										$sql = "SELECT a.item_id 'item_id', a.item_qyt , c.chk_ref 'ref_id', c.chk_qty, a.item_title 'item_title', a.item_price 'price', c.chk_qty * a.item_price 'total_price' FROM checkout c, items a WHERE c.chk_item = a.item_id and c.chk_ref = '" . $_SESSION[ref] . "'";											
								
										$run = mysqli_query($conn , $sql);	
										$c = 1;
										$order_qty = 1;
										$sub_price = 0;
									
										while($rows = mysqli_fetch_assoc($run)){
																										
														echo "<tr>";
															echo "<td>$c</td>";
															echo "<td>$rows[item_title]</td>";
															echo "<td>$rows[chk_qty]</td>";
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
					
	
	
