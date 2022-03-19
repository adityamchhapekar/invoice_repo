<!DOCTYPE html>
<html>
<head>
	<title>invoice chart analytics</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <?php include 'invoice_backend.php'; ?>
<script type="text/javascript">
	$(document).ready(function(){
function panelData(){

var data_d  ='data_d';
$.ajax({
	url:'invoice_backend.php',
	type:"POST",
	data:{data_d:data_d},
	dataType:"json",
	success:function(datafor_data){
		$.each(datafor_data,function(d_kye,d_val){
		console.log(d_val.w_q);

						var today = "";
						var week = "";
						var month = "";
						var year = "";
						if (d_val.d_q > 0) {
						today+='<tr align="center">';
						today+='<td>'+d_val.d_q+'</td>';
						today+='<td>'+d_val.d_p+'</td>';
						
						today+='</tr>';
						$('#today').append(today);

					}else{$("#today").append('<tr align="center"><td>No Data Found..!</td></tr>')}


						if (d_val.w_q> 0) {
						week+='<tr align="center">';
						week+='<td>'+d_val.w_q+'</td>';
						week+='<td>'+d_val.w_p+'</td>';

						week+='</tr>';
						$('#week').append(week);
					}else
				 {$("#week").append('<tr align="center"><td>No Data Found..!</td></tr>')}

						if (d_val.m_p >0) {
						month+='<tr align="center">';
						month+='<td>'+d_val.m_q+'</td>';
						month+='<td>'+d_val.m_p+'</td>';
						month+='</tr>';
						$('#month').append(month);
					}else
				 {$("#month").append('<tr align="center"><td>No Data Found..!</td></tr>')}
						if (d_val.y_q >0) {
						year+='<tr align="center">';
						year+='<td>'+d_val.y_q+'</td>';
						year+='<td>'+d_val.y_p+'</td>';
						year+='</tr>';
						$('#year').append(year);
					}else
				 {$("#year").append('<tr align="center"><td>No Data Found..!</td></tr>' )}
				 


		});
	}
});


}//func panelData.. 
panelData();
		function analytics(){

			var action = "chart";
		

			$.ajax({
				url:"invoice_backend.php",
				type:'POST',
				data:{action:action},
				dataType:'json',
				success:function(panle_data){
					// console.log(panle_data);
					$.each(panle_data,function(panel_k , panel_v){		
					// console.log(panel_v.q+' '+panel_v.p) ;
					console.log(panel_v.ch_q+' '+panel_v.ch_d) ;


				 var ch_q = panel_v.ch_q ;
				 var ch_d = panel_v.ch_d;
				 var ch_ft = panel_v.ch_ft;
				 var val_a = panel_v.val_a;
				 var val_b = panel_v.val_b;

			var ctx = $("#mychart");
			var mychart = new Chart(ctx,{
				type:'bar',
				data:{
					labels:['Qauntity' , 'Discount', 'Total Income','Tax_a Amount','Tax_b Amount'],
					datasets:[{
						data:[ch_q , ch_d , ch_ft , val_a , val_b],
						label:"Customers Overview",
						backgroundColor:['hotpink','cadetblue','indigo' ,'cadetblue','blue'],
					}],
				},//data
				options:{
					title:{
						position:'bottom',
						display:true,
						text:'Custome Title for Chart',
						fontSize:26,
						fontColor:'red',

					},
					tooltips:{
						enabled:true,
						backgroundColor:'hotpink',
						color:'white',
					},
					animation:{
						duration:2560,
						ease:'easeInOutBounce',


					},
				},//opt
			})




					});



				}
			})

		}
		analytics();
	})
</script>
</head>
<body>
	<div class="container-fluid">
		<div class="hold-card-div">
			<div class="row">
				<div class="col-sm-3 col-md-3"> 
					<div class="panel panel-default">
						<div class="panel-heading" style="background: cadetblue	 ; color: white ;">
	<h5 class="panel-title" align="center">Today's Data</h5>
						</div>
						 <div class="panel-body">
						 	<table class="table table-striped" id="today">
						 		<tr>
						 			<th>Total product sell</th>
						 			<th>total Income</th>
						 		</tr>
						 	</table>
						 </div>
					</div>

				</div>
				<div class="col-sm-3 col-md-3"> 
					<div class="panel panel-default">
						<div class="panel-heading" style="background: hotpink; color:  white;">
	<h5 class="panel-title" align="center">Week Data</h5>
						 </div>
						 <div class="panel-body">
						 	<table class="table table-striped" id="week">
						 		<tr>
						 			<th>Total product sell</th>
						 			<th>total Income</th>
						 		</tr>
						 	</table>

						 	 </div>
					</div>

				</div>
 				<div class="col-sm-3 col-md-3"> 
					<div class="panel panel-default">
						<div class="panel-heading" style="background: goldenrod; color:white;">
	<h5 class="panel-title" align="center">Month Data</h5>
						 </div>
						 <div class="panel-body">
						 	<table class="table table-striped" id="month">
						 		<tr>
						 			<th>Total product sell</th>
						 			<th>total Income</th>
						 		</tr>

						 	</table>

						  </div>
					</div>

				</div>
								<div class="col-sm-3 col-md-3"> 
					<div class="panel panel-default">
						<div class="panel-heading" style="background: indigo; color:white;">
	<h5 class="panel-title" align="center">Year Data</h5>
						 </div>
						 <div class="panel-body">

						 	<table class="table table-striped" id="year">
						 		<tr>
						 			<th>Total product sell</th>
						 			<th>total Income</th>
						 		</tr>
						 	</table>

						 	 </div>
					</div>

				</div>..
 


			</div>
		</div>
 <div class="col-sm-8 col-md-8 chart_div">
		<canvas id="mychart"></canvas>

</div>
	</div>

<!-- <canvas id="myChart"></canvas> -->
</body>
</html>