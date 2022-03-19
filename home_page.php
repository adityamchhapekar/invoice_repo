<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="invoice.css">

</head>
<body>
 	<!-- <div class="loader">L</div> -->

<div class="container">
<div class="row">
	<div class="col-sm-12">
<div id="head-div">
<!-- succ err msg  div -->
	<div class="alert alert-success succ" hidden></div>
	<div class="alert alert-danger error" hidden></div>

	<h2 id="h-style">INVOICE</h2>
<div class="l-r"></div>
</div>

<div id="menu-bar-btn_div">
	<button class="btn btn-primary menu_btn" id="menu-bar-btn">&#9776;</button>
</div>
<div class="menu-bar" id="menu-id"></div>



<!-- login register page -->
 	<!-- login form -->
 	<div class="login-div">
	<h3><- LOGGIN -></h3>

 	<div class="form-group" id="login-form-div">
		<form method="post" class="form-group" id="c_login_form">
			<label>USER NAME : </label>
			<input  class="form-control f_c" name="c_l_username" id="c_l_username" placeholder="Enter User Name"><br><br>
			<label>PASSWORD : </label>
			
			<input  class="form-control f_c" name="c_l_pass" id="c_l_pass" placeholder="Enter Password"><br><br>
			<input type="submit" class="btn btn-info btn-lg" name="login_submit" id="login-sub" value="Login">

		</form>
	</div>
</div>

 <div class="main"> 
  <!-- register form..  -->
   	<div class="form-group" id="form_div">
	<h3><- REGISTER -></h3>
		
		<form class="form-group" method="post" id="in_creator_form">
				 <input  class="form-control f_c"  name="c_username" id="c_username" placeholder="Enter User Name"><br>

				<input type="text" class="form-control f_c" name="c_fname" id="c_fname" placeholder="Enter First Name"><br>
				
				<input type="text" class="form-control f_c" name="c_lname" id="c_lname" placeholder="Enter Last Name"><br>

				<input type="email" class="form-control f_c" name="c_email" id="c_email" placeholder="Enter Email"><br>

				<input class="form-control f_c" name="c_num" id="c_num" placeholder="Enter Mob Number"><br>

				<input  class="form-control f_c" type="password" name="c_pass" id="c_pass" placeholder="Password"><br>

				<input  class="form-control f_c" type="password" name="c_confirm_pass" id="c_confirm_pass" placeholder="confirm Password"><br>

				<input type="submit" class="btn btn-primary btn-lg" name="submit" id="reg-sub" value="Register">
			</form>
	</div>
</div>
<!-- </div>container-div... -->
</div>
</div>
	
	<!--discription-div1  -->
	<div class="row">
<div id="what" align="center"><h3>WHAT WE OFFER..this is not all we have more</h3></div>

		<div class="col-sm-4 col-md-4">

 			<div class=" panel panel-default discription1">
 				<div class="panel-heading" style="background-color:cadetblue ; color: white ;">
				<h3 class="panel-title">discription</h3>
 					
 				</div>
 				<div class="panel-body">
				<img src="img_folder\PicsArt_Login.png" alt="Register img">

				<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat cillum dolore eu fugiat cillum dolore eu fugiat .
			</p>
		</div>
		<div class="panel-footer" style="background-color: cadetblue ; color: white ;">
			<span>Login Page</span>

		</div>
			</div>
			</div>
				<div class="row">
<!--  -->
		<div class="col-sm-4 col-md-4">

 			<div class=" panel panel-default discription1">
 				<div class="panel-heading" style="background-color:goldenrod ; color: white ;">
				<h3 class="panel-title">discription</h3>
 					
 				</div>
 				<div class="panel-body">
				<img src="img_folder\PicsArt_Register.png" alt="Register img">

				<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.
 
			</p>
		</div>
		<div class="panel-footer" style="background-color: goldenrod ; color: white ;">
			<span>Register Page</span>
		</div>
			</div>
			</div>
			<!--  -->
				<div class="row">
<!-- <div id="what" align="center"><h3>WHAT WE OFFER..</h3></div> -->

		<div class="col-sm-4 col-md-4">

 			<div class=" panel panel-default discription1">
 				<div class="panel-heading" style="background-color:hotpink ; color: white ;">
				<h3 class="panel-title">discription</h3>
 					
 				</div>
 				<div class="panel-body">
				<img src="	img_folder\load_data.png" alt="load data img">

				<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla.
 
			</p>
		</div>
		<div class="panel-footer" style="background-color: hotpink ; color: white ;">
			<span>invoice page</span>
		
		</div>
			</div>
			</div>

<!-- discription 2 -->
				<div class="row">
<div id="what" align="center"><h3>WHAT WE OFFER..</h3></div>

		<div class="col-sm-6 col-md-6">

 			<div class=" panel panel-default discription1">
 				<div class="panel-heading" style="background-color:indigo ; color: white ;">
				<h3 class="panel-title">discription</h3>
 					
 				</div>
 				<div class="panel-body">
				<img src="img_folder\in_up.png" alt="Register img">

				<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla.
 
			</p>
		</div>
		<div class="panel-footer" style="background-color: indigo ; color: white ;">
			<span>Update Page</span>
		
		</div>
			</div>
			</div>
				<div class="row">

		<div class="col-sm-6 col-md-6">

 			<div class=" panel panel-default discription1">
 				<div class="panel-heading" style="background-color:lightblue ; color: white ;">
				<h3 class="panel-title">discription</h3>
 					
 				</div>
 				<div class="panel-body">
				<img src="img_folder\user_up.png" alt="Register img">

				<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla.
 
			</p>
		</div>
		<div class="panel-footer" style="background-color: lightblue ; color: white ;">
			<span>User Update Page</span>
		
		</div>
			</div>
			</div>
			<!-- discription 3 -->
							<div class="row">
<div id="what" align="center"><h3>WHAT WE OFFER..</h3></div>

		<div class="col-sm-12 col-md-12">

 			<div class=" panel panel-default discription1">
 				<div class="panel-heading" style="background-color:aqua ; color: white ;">
				<h3 class="panel-title">discription</h3>
 					
 				</div>
 				<div class="panel-body">
				<img src="img_folder\invoice_chart_analytics.png" alt="Register img">

				<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla.
 
			</p>
		</div>
		<div class="panel-footer" style="background-color: darkorchid ; color: white ;">
			<span>Analytics</span>
		
		</div>
			</div>
		<h3>..this is not all we have more</h3>
			
			</div>






 </div>

	<!--  row PicsArt_Login -->
<!-- 	<div class="row">

		<div class="col-sm-4 col-md-4">

 			<div class=" panel panel-default discription1">
 				<div class="panel-heading" style="background-color:cadetblue ; color: white ;">
				<h3 class="panel-title">discription</h3>
 					
 				</div>p-h
 				<div class="panel-body">
				<img src="PicsArt_Login.png" alt="Register img">

				<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.
 
			</p>
		</div>p-b
		<div class="panel-footer" style="background-color: cadetblue ; color: white ;">
			<p>this ipsum dolor sit amet, consectetur</p>
		</div>p-f
			</div>col
 
		</div>row


</div>
 -->
<!-- library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="invoice_all.js"></script>

	</body>
</html>