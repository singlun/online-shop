<?php
	include("includes/db.php");
	include("includes/chklogin.php");
?>					
			<div id="myModal" class="modal fade" >
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>
					  <div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Contact Number</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>States</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Contact Number</label>
							<textarea class="form-control"></textarea>
						</div>		
						<div class="form-group">
							<label>States</label>
							<input type="text" id="states_id" list="States">			
							<datalist id="States">
								<select>
									  <option value="Alabama">
									  <option value="Alaska">
									  <option value="Georgia">
									  <option value="Hawaii">
									  <option value="New York">
									  <option value="Ohio">
									  <option value="Washington">
								</select>
							</datalist>					
						</div>
						<div class="form-group">
							<input type="button" class="btn btn-danger btn-lg btn-block" value="Submit">
					</div>		
				 </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
				</div>
			</div>
		</div>
