<!DOCTYPE html>
<html>
<head>
	<title>load data</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta name="color-scheme" content="dark light">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style type="text/css">
@page{

	size: a4;
}
		/*in_load.php*/
	/*export style*/
	.export{display: none; text-align: center;}
#exp-cust_data{
	text-align: center;

	height: 100%;
	width: 100%;
}

	.testing{display: none;}
	#search{width: 26%;}
	.search{border-style: solid;
		border-color: goldenrod;
		margin: 5px;
background-color: hotpink;
border-radius: 6px;
	}
	th{text-align: center;}
	tr{height: 50px;}
#final-sub{
	text-align: center;
	width: 50%;
	height: auto;
	padding: 12px;
	box-shadow: 2px 3px grey;
	border-style: solid;
	border-color:hotpink;
	border-radius:12px;
	border-right:6px solid cadetblue;
	border-left:5px solid cadetblue;
	border-right-style: solid;
	border-left-style: solid;

}
.insert-form{display: none;}
.main_load_div,.u{
	padding: 10px;
	margin: 5px;
	border-style: solid;
	border-color: cadetblue;
	border-radius: 21px;
}
#create-invoice , #close-invoice{margin-left: 93%; margin-bottom:5px; }
#close_export_div{
	/*text-align: center;*/
	padding-top: 21px;
	margin-left: 12px;
	padding-bottom: 12px;
}
.loader{
	display: none;
text-shadow: 2px 2px green;
position: absolute;
background:pink ; 
color: white ; 
text-align: center;
border:12px solid black;
border-radius:50% ;
border-top: 12px solid cadetblue;
border-right:12px solid hotpink; 
border-bottom:12px solid green;
border-left: 12px solid grey;
height: 50px;
width: 50px;
		margin-top: 25%;
		margin-right: 50%;
		margin-bottom: 25% ;
		margin-left: 50% ;

-webkit-animation : spin 1.2s linear infinite;
animation: spin 1.2s linear infinite ;

}
@keyframes spin {
	0%{transform: rotate(0deg);}
	100%{transform: rotate(360deg);}
}
@-webkit-keyframes spin {
	0%{-webkit-transform: rotate(0deg);}
	100%{-webkit-transform: rotate(360deg);}
}


</style>


<link rel="stylesheet" href="invoice.css">

</head>
 
 <body>
 	 	<!-- print export data -->
 	<div class="loader">L</div>

 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
<div class="export_div" hidden="">
<div class="info" id="close_export_div"><button class="btn btn-danger" id="close_exp_btn">X</button></div>
<h3>client purches details</h3>
<table class="table table-bordered table-responsive" id="tab">
		<thead>
		<tr>
			<th>cust ID</th>

			<th>First Name</th>
			<th>Last Name</th>
			<th>Dr.Name</th>
			<th>Ph: Number</th>


		</tr>


	</thead>
<div id="load">
<tbody id="exp_tbody">
	<tr align="center">
		<td id="exp_id"></td>
		<td id="exp_fn"></td>
		<td id="exp_ln"></td>
		<td id="exp_dr"></td>
		<td id="exp_num"></td>

	</tr>
</tbody>
 <tfoot id="exp_tfoot">
 	<tr>
			<th>ITEM NAME</th>
			<th>QNTY</th>
			<th>PRICE</th>
			<th>Total</th>
			<th>disct</th>
			<th>taxble-amt</th>
 			<th>S-GST</th>
			<th>G-GST</th>

 			<th>S-GST</th>
			<th>G-GST</th>
 			<th>final amt</th>
		</tr>
 
</tfoot>
</table>
<center>
	<button class="btn btn-primary hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> priint</button>

</center>
</div>
 			
 		</div>
 	</div>
 </div>

 	<!-- print export data -->


 	<!-- this div for update form data.. -->
<div class="container-fluid" id="container">

		<div class="alert alert-success succ" hidden></div>
	<div class="alert alert-danger error" hidden></div>

 	<div id="head-div">
	<h3 align="center">INVOICE DATA</h3>
<div class="l-r"></div>
</div>

<div id="menu-bar-btn_div">
	<button class="btn btn-primary menu_btn" id="menu-bar-btn">&#9776;</button>
</div>
<div class="menu-bar" id="menu-id"></div>	


 	<div class="testing">
 		<form id="update-form">
 		<input type="hidden" name="total_form_up" id="total_form_rows">
		<input type="hidden" name="p_id_up" id="p_id">
 
<!-- this table for user info to update data -->
<div class="u">
 		<button class="btn btn-danger btn-sm" id="close_update_div">X</button>
	
	<table class="table table-bordered table-responsive" id="user-update-info">
		<tr style="background: goldenrod ; color: white">
			<th>p_name</th>
			<th>p_lname</th>
			<th>p_dr</th>
			<th>p_num</th>

		</tr>
			<tr>
				<td><input class="form-control p_name_up" id="p_name" name="p_name_up"></td>
				<td><input class="form-control p_lname_up" id="p_lname" name="p_lname_up"></td>
				<td><input class="form-control p_dr_up" id="p_dr" name="p_dr_up"></td>
				<td><input class="form-control p_num_up" id="p_num" name="p_num_up"></td>

			</tr>
			<!-- this table for produuct info to update data -->
			<table class="table table-bordered" id="produc-up-data">

		<tr style="background-color: cadetblue;color: white">
			<th>sr_no</th>
			<th>product_name/s</th>
			<th>qty</th>
			<th>price</th>
			<th>total</th>
			<th>discnt</th>
			<th>tax amt</th>
			<th colspan="2">S-GST</th>
			<th colspan="2">C-GST</th>
			<th>final_amt</th>
		</tr>

			</table>
		</table>
		<div id="final-up-sub">
			<label>Final Amount : </label>
			<span id="total_total"></span><br>
			<input type="submit" class="btn btn-info check_loder" id="update-submit" name="update-submit" value="update">		

		</div>

	</form>

    </div>
</div>
<!-- end of update.. -->

<div class="container">
	<div class="main_load_div">
		<div class="search ">
 <label>search : </label>:<input type="text" name="search" class="form-control" id="search" placeholder="search here">
 <button class="btn btn-info btn-md" id="create-invoice">create</button>
 <button class="btn btn-danger btn-md" id="close-invoice"  style="display: none;">close</button>

 		</div>
		<!-- insert form.. -->
		<div class="insert-form">
			 <form method="POST" class="form form-group" id="ins-form">
		<table class="table table-bordered" id="user-info-tab">

				<tr style="background-color: cadetblue">
					<th>first Name</th>
					<th>Last Name </th>
					<th>Dr.Name</th>
					<th>PH:Num</th>

				</tr>
				<tr>	

	<td><input type="p_num" name="p_name" class="form-control" id="p_name" placeholder="Client First Name " required></td>
		
		<td><input type="text" name="p_lname" class="form-control" id="p_lname" placeholder="Client Last Name " required></td>
		
		<td><input type="text" name="p_dr" class="form-control" id="p_dr" placeholder="Client DR Name " required></td>
		
		<td><input type="text" name="p_num" class="form-control" id="p_num" placeholder="Client ph:Num " required></td>
		
	</tr>
 		<table class="table table-bordered " id="product_data">
		<tr style="background: goldenrod;color: white">
			<th>sr.no</th>
			<th>produc Name</th>
			<th>qty</th>
			<th>price</th>
			<th>total</th>
			<th>dis</th>
			<th>taxable_amt</th>
			<th colspan="2">S-GST</th>
			<th colspan="2">C-GST</th>
			<th>f_amt</th>



		</tr>
 		<tr>
			<td><span>1</span></td>

 		<td><input type="text" name="product_name[]" class="form-control product_name" id="product_name1" placeholder="product_name "></td>

		<td><input type="number" name="qauntity[]" class="form-control quantity" id="quantity1" placeholder=" quantity "></td>

		<td><input type="number" name="price[]" class="form-control price" id="price1" placeholder="price"></td>

		<td><input  name="total[]" class="form-control total" id="total1" readonly></td>

		<td><input type="number" name="discount[]" class="form-control discount" id="discount1" placeholder="discount"></td>

		<td><input  name="taxable_val[]" class="form-control taxable_val" id="taxable_val1" readonly></td>

		<td><input type="number" name="rate_a[]" class="form-control rate_a" id="rate_a1" placeholder="rate_a "></td>

		<td><input  name="val_a[]" class="form-control val_a" id="val_a1" readonly></td>

		<td><input type="number" name="rate_b[]" class="form-control rate_b" id="rate_b1" placeholder="rate_b "></td>

		<td><input name="val_b[]" class="form-control val_b" id="val_b1" readonly></td>
		<td><input name="f_amt[]" class="form-control f_amt" id="f_amt1" readonly></td>

		<td>
			<button class="btn btn-success btn-xs" id="add">+add</button>
		</td>			
		</tr>
 	</table>

		</table>
		<div id="final-sub">
			<input type="hidden" name="total_forms" id="total_forms" class="total_forms" value="1">
			<label>Final Amount : </label>
			<span class = "total_total"></span><br>
			<input type="submit" class="btn btn-info" id="ins-submit" name="ins-submit" value="submit">			

		</div>
</form>
	</div>


	<div class="table-responsive load-data" >

</div>


</div>

<!-- library -->


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- data Table cdn.. -->
<script src="invoice_all.js"></script>

   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>



</body>
</html>