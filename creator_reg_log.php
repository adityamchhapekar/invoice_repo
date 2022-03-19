	<!DOCTYPE html>
<html>
<head>
	<title>register-login to invoice</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="invoice.css">
	
</head>
<body>
<div class="container">
<!--  	 login form -->
 	<div class="login-div">
	<h3><- LOGGIN -></h3>

 	<div class="form-group" id="login-form-div">
		<form method="post" class="form-group" id="c_login_form">
			<label>USER NAME : </label>
			<input name="c_l_username" class="form-control" name="c_l_username" id="c_l_username" placeholder="Enter User Name"><br><br>
			<label>PASSWORD : </label>
			
			<input name="c_l_username" class="form-control" name="c_l_pass" id="c_l_pass" placeholder="Enter Password"><br><br>
			<input type="submit" class="btn btn-info" name="login_submit" id="login-sub" value="Login" style="width:26% ;">

		</form>
	</div>
</div>

 <div class="main"> 
  <!-- register form..  -->
   	<div class="form-group" id="form_div">
	<h3><- REGISTER -></h3>
		
		<form class="form-group" method="post" id="in_creator_form">
				 <input  class="form-control" name="c_username" placeholder="Enter User Name"><br>

				<input type="text" class="form-control" name="c_fname" placeholder="Enter First Name"><br>
				
				<input type="text" class="form-control" name="c_lname" placeholder="Enter Last Name"><br>

				<input type="email" class="form-control" name="c_email" placeholder="Enter Email"><br>

				<input class="form-control" name="c_num" placeholder="Enter Mob Number"><br>

				<input  class="form-control" type="password" name="c_pass" placeholder="Password"><br>

				<input  class="form-control" type="password" name="c_confirm_pass" placeholder="confirm Password"><br>

				<input type="submit" class="btn btn-primary" name="submit" id="reg-sub" value="submit" style="width: 26% ; ">
			</form>
	</div>
</div>	
</div>

 --><!-- library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="invoice_all.js"></script>
</body>
</html>