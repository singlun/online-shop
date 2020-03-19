
<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="" class="navbar-brand">Online Shopping</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<?php	

							$sql = "select * from item_cat";
							$run = mysqli_query($conn , $sql);	
							while($rows = mysqli_fetch_assoc($run)){
								$str_name =  ucwords($rows['cat_name']);
								
								echo "<li><a href='index.php?cat_id=$rows[cat_id]'>$str_name</a></li>";
							}
					?>
				</ul>
				<ul class="navbar-right dropdown" style="margin-top: 10px">
					<a class="dropdown-toggle" data-toggle="dropdown" style="color: white; text-decoration: none;cursor: pointer;">Profile <span class="caret"></span></a>
					<ul class="dropdown-menu" style="backgroud: gray;">
					<?php
						//if ($_SESSION['u_id'] != "false") {
						//	echo "<li><b>Register</b></li>";							
						//}
						//else {							
							echo "<li><a href='#'  style='color: black;'><b>User - ".$_SESSION['username']."</b></a></li>";
						//}
					?>	
						<li><a href="index.php" style="color: black;"><a href="logout.php"><b>Logout</b></a></li>
					</ul>				
				</ul>
			</div>
		</nav>