<?php 
	session_start();
	//if (isset($_REQUEST['logout'])){
	$_SESSION['u_id'] = "false";
	$_SESSION['mode'] = "L";
	$_SESSION['chk_qty'] = 0;	
	$_SESSION['username'] = "";
		//echo "logout";
	//}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>OnLine Store</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/style2.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<script>

			function submit_form() {

				xmlhttp = new XMLHttpRequest();	

			    xmlhttp = new XMLHttpRequest();				
				xmlhttp.onreadystatechange = function(){
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
						var receiver = document.getElementById('feedback');
						receiver.innerHTML = xmlhttp.responseText;
					}
				}	

				var username=encodeURIComponent(document.getElementById("username").value);
				var name=encodeURIComponent(document.getElementById("name").value);
				var password=encodeURIComponent(document.getElementById("password").value);
				var email=encodeURIComponent(document.getElementById("email").value);
				var contactnumber=encodeURIComponent(document.getElementById("contactnumber").value);
				var address=encodeURIComponent(document.getElementById("address").value);
				var parameters="username="+username+"&name="+name+"&password="+password+"&email="+email+"&contactnumber="+contactnumber+"&address="+address;
				xmlhttp.open("POST", "user_reg.php", true)
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				xmlhttp.send(parameters)

				//xmlhttp.open('GET','user_reg.php',true);
				//xmlhttp.send();

				$('#myModal').modal('hide');
				
				userform.reset();
				
				return false;
			}

	
	</script>
	
	<body>	
	<div class="container">		
					<div id="myModal" class="modal fade" >
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div  style="margin: 5px; float: right;">
									<button class="close" data-dismiss="modal">&times;</button>
								</div>								
							  <div class="modal-header">
								<h2>User Registration</h2>
							  </div>
							  <div class="modal-body">
							  <form id="userform" onSubmit="return submit_form()">
								<div class="form-group">
									<label>Login Name</label>
									<input type="text" id="username" class="form-control" required>
								</div>
								<div class="form-group">
									<label> Name</label>
									<input type="text" id="name" class="form-control" required>
								</div>								
								<div class="form-group">
									<label>Password</label>
									<input type="password" id="password" class="form-control" required>
								</div>								
								<div class="form-group">
									<label>Email Address</label>
									<input type="email" id="email"  class="form-control" required>
								</div>
								<div class="form-group">
									<label>Contact Number</label>
									<input type="text" id="contactnumber" class="form-control">
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" id="address" required></textarea>
								</div>		
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg">Submit</button>
							</div>		
						 </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
						</form>
						</div>
					</div>
				</div>
					
					<div class="text-center"><h1>WELCOME TO THE ONLINE STORE</h1></div>
					<div class="text-center" id="feedback" ><a style="color: #3399ff; text-decoration: none;cursor: pointer;" data-toggle="modal" data-target="#myModal">Not a user - click to Registered</a></div>
					<form class="form-horizontal" action="index.php" method="post">
		<?php				
						if (isset($_REQUEST['login'])) {
								echo "<div class='form-group'>";
								echo "<div  class='col-md-4 control-label'></div>";
								echo "<div class='col-md-4' style='color: red'><b>Login Fail. Please Login Again.</b></div>";
								echo "<div class='col-md-4'></div>";
								echo "</div>";
						}
		?>						
						<div class="form-group">
							<label class="col-md-4 control-label">User Name</label>
							<div class="col-md-4">
								<input name= "u_name" type="text" value="" class="form-control" required>
							</div>
							<div class="col-md-4"></div>							
						</div>
						<div class="form-group">   
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-4">
								<input name= "u_password" type="password"  value="" class="form-control" required>
							</div>
							<div class="col-md-4"></div>	
						</div>	
						<div class="form-group">
							<div class="col-md-4"></div>	
							<div class="col-md-4">
								<button class="btn btn-danger">Login</button>														
							</div>
							<div class="col-md-4"></div>	
						</div>						
					</form>							
	</div>
	</body>
</html>