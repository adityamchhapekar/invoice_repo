<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="invoice.css">

</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="invoice_all.js"></script>

 	<div class="loader">L</div>

  <!-- invoice creator update form..   id="form_div"-->
  		<div class="alert alert-success succ" hidden></div>
	<div class="alert alert-danger error" hidden></div>

   	<div class="form-group" id="up_form_div" align="center">
	<h3><- UPDATE PROFILE -></h3>
		
		<form class="form-group" method="post" id="in_creator_up_form">
			<input type="hidden" name="c_up_id" id="c_up_id">
 			<table class="table table-striped table-responsive " id="c_up_tab">

<tr class="success">
					<th>userName</th>
				<th>first name</th>
				<th>last name</th>
				<th>email</th>
				<th>ph: NUM</th>
				<th>password</th>

</tr>


<tr>
	<td><input  class="form-control c_up_username " name="c_up_username" id="c_up_username"></td>

 <td><input type="text" class="form-control " name="c_up_fname" id="c_up_fname"></td>		
 
 <td><input type="text" class="form-control " name="c_up_lname" id="c_up_lname"></td>
 	<td><input type="email" class="form-control " name="c_up_email" id="c_up_email"></td>
 	<td><input class="form-control " name="c_up_num" id="c_up_num"></td>
 	<td><input  class="form-control " name="c_up_pass" id="c_up_pass"></td>

			</table>
<div align="center">
	 <input type="submit" class="btn btn-primary btn-lg" name="up_submit" id="update-sub" value="update">

</div>

 			</form>
	</div>
 
</body>
</html>