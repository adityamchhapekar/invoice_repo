$(document).ready(function(){
//func for display msg..error and success..
function msg(dataMsg,status){
	if (status==true) {``
		$('.succ').html(dataMsg).slideDown();
		$('.error').slideUp();
		setTimeout(function(){
			$('.succ').slideUp();
		},2560);
	}
		else if(status == false){
			$('.succ').slideUp();
			$('.error').html(dataMsg).slideDown();
			setTimeout(function(){
				$('.error').slideUp();
			},2560);
		}
}//func msg..
// msg();

//add btn.. it will add product data i.e inp fields..
var count = 1;
var total_total = $('#total_total').text();
$("#add").on("click",function(add){
	add.preventDefault();

count++;
  $('#total_forms').val(count);

// console.log(count +'=' + total_forms);

var ht_cd = "";
ht_cd+='<tr id="add-rem'+count+'">';	
ht_cd+='<td id="sr'+count+'><span  id="sr_no">'+count+'</span></td>';

ht_cd+='<td><input name="product_name[]" class="form-control product_name" id="product_name'+count+'"></td>';

ht_cd+='<td><input name="qauntity[]" class="form-control quantity" id="quantity'+count+'"></td>';
ht_cd+='<td><input name="price[]" class="form-control price" id="price'+count+'"></td>';
ht_cd+='<td><input name="total[]" class="form-control total" id="total'+count+'" readonly></td>';
ht_cd+='<td><input name="discount[]" class="form-control discount" id="discount'+count+'"></td>';
ht_cd+='<td><input name="taxable_val[]" class="form-control val_b" id="taxable_val'+count+'" readonly></td>';
ht_cd+='<td><input name="rate_a[]" class="form-control rate_a" id="rate_a'+count+'"></td>';
ht_cd+='<td><input name="val_a[]" class="form-control val_a" id="val_a'+count+'" readonly></td>';
ht_cd+='<td><input name="rate_b[]" class="form-control rate_b" id="rate_b'+count+'"></td>';
ht_cd+='<td><input name="val_b[]" class="form-control val_b" id="val_b'+count+'" readonly></td>';
ht_cd+='<td><input name="f_amt[]" class="form-control f_amt" id="f_amt'+count+'" readonly></td>';

ht_cd+='<td><button class="btn btn-danger btn-xs rem-btn" id="'+count+'">-rem</button></td>';
ht_cd+="</tr>";
$("#product_data").append(ht_cd);
});
//remove-row ..it will remove row which contains product data which is added by clicking add-btn
$(document).on("click",".rem-btn",function(r){
	r.preventDefault();
	var rem = $(this).attr("id");
var a = $("#f_amt"+rem).val();
var b = $("#total_total").text();
var total_total = parseFloat(b) - parseFloat(a);
	$("#total_total").text(total_total);
	$("#add-rem"+rem).remove();
	
	count--;
$('#sr_no').text();
});
	//function for display data of client..
	function loadData(page_no){
		var actions = "loads";

		$.ajax({
			url:"invoice_backend.php",
			type:'post',
			data:{actions:actions,page_no:page_no},
			success:function(data){
				// console.log(data);

					$('.load-data').html(data);
		    }
		})
	}//fn
	loadData();
	//it will set page id in loadData function for pagination
	$(document).on("click","#pagination a",function(p){
		p.preventDefault();
	var	page_no = $(this).attr('id');
		loadData(page_no);
	})

	// func for  calculation part..it will calc input fields
	function calculation(count){
	total_total =0;
for (var i =0;  i<=count; ++i) {

		var quantity = 0;
		var price = 0; 
		var total = 0; 
		var discount = 0; 
		var taxable_val = 0; 
		var rate_a = 0; 
		var val_a = 0; 
		var rate_b = 0;
		var val_b = 0; 
		var f_amt = 0;

     	quantity = $("#quantity"+i).val();

     	if (quantity>0) {
     		price = $("#price"+i).val();
     		if (price>0) {
     		total = parseFloat(quantity)*parseFloat(price);
     		$('#total'+i).val(total);
     		if (total>0) {
     			discount = $('#discount'+i).val();

     			if (discount>0) {
     				taxable_val = parseFloat(total)-parseFloat(discount);
     				$('#taxable_val'+i).val(taxable_val);
     				rate_a = $('#rate_a'+i).val();
     				if (rate_a>0) {
     					val_a = parseFloat(taxable_val)*parseFloat(rate_a)/100;
     					$('#val_a'+i).val(val_a);
     				}
     				rate_b = $('#rate_b'+i).val();
     				if (rate_b>0) {
     					val_b = parseFloat(taxable_val)*parseFloat(rate_b)/100;
     					$('#val_b'+i).val(val_b);
     				}
     				f_amt = parseFloat(taxable_val)+parseFloat(val_a)+parseFloat(val_b);
     				$('#f_amt'+i).val(f_amt);
     				total_total = parseFloat(total_total)+parseFloat(f_amt);
     				$('.total_total').text(total_total);

     			}//dis
     		}	
     		}
     	};//q	
     }//for-loop
	

	}// calc func

     	$(document).on('blur','.price' ,function(){
     		calculation(count);
     		
     		console.log (count);
     	});//.pri
       	$(document).on('blur','.discount',function(){
     		calculation(count);
     	});//.dis	
     	$(document).on('blur','.rate_a',function(){
     		calculation(count);
     	});//.rta
     	     	$(document).on('blur','.rate_b',function(){
     		calculation(count);
     	});//.rtb	

//ins-form..this is client persnal & purches details..
$("#ins-form").submit(function(eup){
	eup.preventDefault();
	$.ajax({
		url:"invoice_backend.php",
		type:"POST",
		data:$(this).serializeArray(),
		dataType:'json',
		beforeSend:loader(),
		success:function(daa){
				stop_loader();
			if (daa.status == true) {
				setTimeout(function(){
			msg(daa.dataMsg , daa.status);
				$('#ins-form').trigger('reset');

				},2560);
			}else{msg(daa.dataMsg , daa.status)}

		}
	});//ins-ajax..
});
//.,.,.,

//update-form ..it will update client details..
$("#update-form").submit(function(e){
	e.preventDefault();
	$.ajax({
		url:"invoice_backend.php",
		type:"POST",
		dataType:'json',
		beforeSend:loader(),
		data:$(this).serializeArray(),
		success:function(updata){
			stop_loader();

			if (updata.status == true) {
				setTimeout(function(){
			msg(updata.dataMsg , updata.status);

				$('.testing').hide();
				$('.main_load_div').show();

				},2560);
			}//if
			else{msg(updata.dataMsg , updata.status);}
		}
	});
});//upd

//search query...
$('#search').on('keyup',function(){
	$('#load-data').html("");
	var search = $(this).val();
	var action = "search_data";
	if (search!=="") {
		$.ajax({
			url:"invoice_backend.php",
			type:"POST",
			data:{search:search,action:action},
			dataType:'json',
			success:function(search_data){

				$('#load-data').append('<thead>'+
    
      '<tr style="background-color: cadetblue;color:white;">'+
      '<th>id</th>'+
      '<th>name</th>'+
      '<th>lname</th>'+
      '<th>dr:name</th>'+
      '<th>num</th>'+
      '<th>Edit</th>'+

      '<th><button class="btn btn-danger btn-sm" id="delete-btn">delete</button></th>'+
      '<th>Export</th>'+
      
    '</tr>'+
'</thead>');

				$.each(search_data,function(sk,sv){
				msg(search_data.dataMsg , search_data.status);


	$('#load-data').append(
//
		'<tr align="center">'+
	'<td>'+sv.p_id+'</td>'+
	'<td>'+sv.p_name+'</td>'+
		'<td>'+sv.p_lname+'</td>'+
 	'<td>'+sv.p_dr+'</td>'+
 	'<td>'+sv.p_num+'</td>'+

 	'<td><button class="btn btn-info btn-sm edit-btn"   data-eid="'+sv.p_id+'">Edit</button></td>'+
	'<td><input type="checkbox" name="checkbox[]" value="'+sv.p_id+'"></input></td>'+
	
'<td><button class="btn btn-success exp-btn" data-eid="'+sv.p_id+'">export-data</button></td>'+	
'</tr>'

	);


				});
			}
		});//search-ajax..
	}
	// console.log(search);

});//keyup..
// delete-query..
$(document).on("click","#delete-btn",function(d_pre){
var action_del = "delete-data";
var del_id = [];
$(":checkbox:checked").each(function(key){
	del_id[key] = $(this).val();
	d_len = del_id.length;
});
if (del_id.length == 0) {
	alert("please select at least one");
	stop_loader();
}
$.ajax({
	url:"invoice_backend.php",
	type:"POST",
	data:{action_del:action_del,del_id:del_id,d_len:d_len},
	dataType:'json',
	beforeSend:loader(),
	success:function(res_del){
$('#load-tab').html("");

			stop_loader();
			if (res_del.status == true) {
				setTimeout(function(){
		msg(res_del.dataMsg , res_del.status);

		loadData();

				},2560);
			}//if
			else{msg(res_del.dataMsg , res_del.status);}

		}
});//del-ajax..
});




//this will show data for export data..
	//select for edit data..
$(document).on("click",'.edit-btn , .exp-btn',function(){
	var edit_id = $(this).data("eid");
	 var action = "get_id";
	 console.log(edit_id);
	$('.testing').show();
	$('.main_load_div').hide();
	$.ajax({

		url:"invoice_backend.php",
		type:'POST',
		data: {edit_id:edit_id,action:action},
		dataType:'json',

		success:function(editd){
			var count =0;

			product_up = "";
			$.each(editd,function(ek,ev){
			count++;
//this will show data for export data..
var cust_purches_data = "";
$("#exp_id").text(ev.p_id);
$("#exp_fn").text(ev.p_name);
$("#exp_ln").text(ev.p_lname);
$("#exp_dr").text(ev.p_dr);
$("#exp_num").text(ev.p_num);

cust_purches_data+='<tr align="center">';
cust_purches_data+='<td>'+ev.item_name+'</td>';
cust_purches_data+='<td>'+ev.qauntity+'</td>';
cust_purches_data+='<td>'+ev.price+'</td>';
cust_purches_data+='<td>'+ev.total+'</td>';
cust_purches_data+='<td>'+ev.discount+'</td>';
cust_purches_data+='<td>'+ev.taxable_val+'</td>';
cust_purches_data+='<td>'+ev.rate_a+'</td>';
cust_purches_data+='<td>'+ev.val_a+'</td>';
cust_purches_data+='<td>'+ev.rate_b+'</td>';
cust_purches_data+='<td>'+ev.val_b+'</td>';
cust_purches_data+='<td>'+ev.f_total+'</td>';

cust_purches_data+='</tr>';

$("#exp_tfoot").append(cust_purches_data);


//this will show data for edit data..
			$('#total_form_rows').val(ev.total_form_rows);
			$('#p_id').val(ev.p_id);
			$('#p_name').val(ev.p_name);
			$('#p_lname').val(ev.p_lname);
			$('#p_dr').val(ev.p_dr);
			$('#p_num').val(ev.p_num);


			  	 		product_up+='<tr>';
			  product_up+='<td id="sr_no'+count+'"><span>'+count+'</span></td>';

		  
		  product_up+='<td><input class="form-control product_name" id="product_name'+count+'" name="product_name_up[]"  value="'+ev.item_name+'"></td>';
		 
		  product_up+='<td><input class="form-control quantity" id="quantity'+count+'" name="quantity_up[]"  value="'+ev.qauntity+'"></td>';
			
			 product_up+='<td><input class="form-control price" id="price'+count+'" name="price_up[]"  value="'+ev.price+'"></td>';
		
		    product_up+='<td><input class="form-control total " id="total'+count+'" name="total_up[]"  value="'+ev.total+'" readonly></td>';
		 
		  product_up+='<td><input class="form-control discount" id="discount'+count+'" name="discount_up[]"  value="'+ev.discount+'"></td>';
		 
		  product_up+='<td><input class="form-control taxable_val" id="taxable_val'+count+'" name="taxable_val_up[]"  value="'+ev.taxable_val+'" readonly></td>';
		
		  product_up+='<td><input class="form-control rate_a" id="rate_a'+count+'" name="rate_a_up[]"  value="'+ev.rate_a+'"></td>';
		 

		  product_up+='<td><input class="form-control val_a" id="val_a'+count+'" name="val_a_up[]"  value="'+ev.val_a+'" readonly></td>';
		  product_up+='<td><input class="form-control rate_b" id="rate_b'+count+'" name="rate_b_up[]"  value="'+ev.rate_b+'"></td>';
		  product_up+='<td><input class="form-control val_b" id="val_b'+count+'" name="val_b_up[]"  value="'+ev.val_b+'" readonly></td>';
		  product_up+='<td><input class="form-control f_amt" id="f_amt'+count+'" name="f_amt_up[]"  value="'+ev.f_total+'" readonly></td>';
		  product_up+='<td><input type="hidden" class="form-control in_id" id="in_id'+count+'" name="in_id_up[]"  value="'+ev.in_id+'" ></td>';
		  product_up+='<td><input type="hidden" class="form-control in_fk" id="in_fk'+count+'" name="in_fk_up[]"  value="'+ev.in_fk+'" ></td>';
				
		  product_up+='</tr>';

							


			});
			var ax = $('#total_form_rows').val();
			console.log(ax);

			     	$(document).on('blur','.price' ,function(){
     		calculation(ax);
     		
     		console.log (ax);
     	});//.pri
       	$(document).on('blur','.discount',function(){
     		calculation(ax);
     	});//.dis	
     	$(document).on('blur','.rate_a',function(){
     		calculation(ax);
     	});//.rta
     	     	$(document).on('blur','.rate_b',function(){
     		calculation(ax);
     	});//.rtb	


			$("#produc-up-data").append(product_up);


		}
	});//ajax..edit

});
 $(document).on("click",".exp-btn",function(){
	$(".testing").hide();
	$("#container").hide();
	$(".export_div").slideDown();

 })
$("#close_exp_btn").on("click",function(){

	$(".export_div").slideUp();
	$("#container").show();
	$(".main_load_div").show();
	$("#tab").load("in_load.php #tab , .testing ");


});
$('#close_update_div').on('click',function(cls_pre){
	cls_pre.preventDefault();
	$('.testing').fadeOut(600);
	$('.main_load_div').show(1200);
	$("#tab").load("in_load.php #tab");
	$(".testing").load("in_load.php .testing");

});



//create-invoice-btn..it will disp invoice form
$('#create-invoice').on('click',function(){ 
	$('.insert-form').show();
	$('.load-data').hide();
	$("#close-invoice").show();

	$(this).hide();
});

//close-invoice-btn..
$("#close-invoice").on('click',function(){
	$('.insert-form').hide();
	$('.load-data').show();
	$("#create-invoice").show();
	$(this).hide();

}); //close-in

//all about invoice creator.....................

// invoice creator register..
	$("#reg-sub").on("click",function(reg_pre){
		reg_pre.preventDefault();
		$.ajax({
			url:"invoice_backend.php",
			type:"POST",
			data:$("#in_creator_form").serialize(),
			beforeSend:loader(),
			success:function(reg_data){
				$('.succ').html(reg_data).show();
				stop_loader();

  }
 });
});//register-btn..
	//it will login user..
	$("#login-sub").on("click",function(log_pre){
		log_pre.preventDefault();
		var user = $("#c_l_username").val();
		var pass = $("#c_l_pass").val();
		console.log(user +" "+ pass);
		$.ajax({
			url:"invoice_backend.php",
			type:"POST",
			data:{user:user,pass:pass},
			dataType:"json",
			success:function(log_data){
				if (log_data.status == true) {
				msg(log_data.dataMsg , log_data.status);

					setTimeout(function(){

					window.location = "in_load.php";
				 $("#c_login_form").trigger("reset");

					},2660);
				}
				else{msg(log_data.dataMsg , log_data.status);}
			}
		});
	});//login-btn
	// Home-page.......
//creator select query..

	//menu-btn..
	//this function will fetch data of invoice creator data for profile upadte..
	function get_menu_id(){
		var action = "get_c_id";
		$.ajax({
			url:"invoice_backend.php",
			type:"POST",
			data:{action:action},
			dataType:"json",
			success:function(m_data){
				$.each(m_data,function(m_up_k,m_up_v){
					$('#c_up_id').val(m_up_v.c_id);

					$('#c_up_username').val(m_up_v.c_user);
					$('#c_up_fname').val(m_up_v.c_fname);
					$('#c_up_lname').val(m_up_v.c_lname);
					$('#c_up_email').val(m_up_v.c_email);
					$('#c_up_num').val(m_up_v.c_num);
					$('#c_up_pass').val(m_up_v.c_pass);
				});

			}
		});
	}
	get_menu_id();

		//update data of invoice creator..btn click
	$("#update-sub").on("click",function(az){
		az.preventDefault();
		var dax = $("#in_creator_up_form").serialize();
		$.ajax({	
			url:"invoice_backend.php",
			type:"POST",
			data:$("#in_creator_up_form").serialize(),
			dataType:'json',
			beforeSend:loader(),
			success:function(update_data){
					stop_loader();
				if (update_data.status == true) {
					msg(update_data.dataMsg,update_data.status);

					setTimeout(function(){
					window.location = "in_load.php";

					},2660)
				}
				else{msg(update_data.dataMsg,update_data.status);}

			}

		});//up-ajax..
	})

//logOut..btn query..
$(document).on("click",".log-out",function(logout_pre){
		logout_pre.preventDefault();
		logout = "logout";
	console.log("log-out btn is clicked..");
	$.ajax({
		url:"invoice_backend.php",
		type:"POST",
		data:{logout:logout},
		beforeSend:loader(),
		success:function(logout){
			stop_loader();
			$(".succ").text("logout success full..please wait a movement...!").slideDown();
			setTimeout(function(){
				window.location = "home_page.php";
			},2560);

		}
	})
});//logout-btn

//this func will show menu..
	function load_menu(){
		var menu = "menu";



		$.ajax({
			url:"invoice_backend.php",
			type:"POST",
			data:{menu:menu},
			success:function(menu_data){
				//if user is login..
				if (menu_data == true) {
					console.log('menu:menu'+'='+menu_data)
					var menu = "";
					var log_regs = "";
					menu+="<div class='profile-div'>";
					menu+="<h3>profile</h3>";
					menu+="<a href='creator_pro_update.php' style='background:goldenrod ;color:white' id='pro-upate-sel'>update-profile</a>";

					menu+="</div>";


					menu+='<span  id="close-nav">&times;</span>';
					menu+='<ul>';
					menu+='<li><a  href="home_page.php">Home</a></li>';
					menu+='<li><a  href="chart_js.php">Analytics</a></li>';
					menu+='<li><a  href="in_load.php">create-invoice</a></li>';
					
					menu+='<li><a  href="">About Us</a></li>';
					menu+='<li><a  href="">Contact Us</a></li>';
					menu+='<li><a  class="log-out">LogOut</a></li>';

					menu+='</ul>';

		log_regs+='<a class="log-out">LogOut</a>';
				$(".l-r").append(log_regs);

					
				$(".menu-bar").append(menu);
				//if user is Not logedIn..
				}else{

					var menus = "";
					var log_reg = "";
menus+='<span id="close-nav">&times;</span>';
					menus+='<ul>';
					menus+='<li><a  href="in_load.php">Home</a></li>';
					menus+='<li><a  href="">About Us</a></li>';
					menu+='<li><a  href="">Contact Us</a></li>';
					menus+='<li><a class="login-btn">Login</a></li>';
					menus+='<li><a class="reg-btn">Register</a></li>';


					menu+='</ul>';
		log_reg+='<a class="login-btn">Login</a>';
		log_reg+=" ";
log_reg+='<a class="reg-btn">Register</a>';
				$(".l-r").append(log_reg);
				$(".menu-bar").append(menus);
				$(".l-r").css({"display":"block"});
				
				}
			}
		});

}
load_menu();

//login-btn..it will display login form.. to login user..
$(document).on("click",".login-btn",function(){
	console.log("login-btn is clicked...");
	$(".login-div").toggle("1200");
	$(".main").hide();

		$(".menu-bar").css({"width":"0","background-color":"black"});

});
//register-btn..it will open register form for registration..
$(document).on("click",".reg-btn",function(){
	console.log("reg-btn is clicked...");
	// var f_c = $(".f_c").val("");
	// console.log(f_c);
	$(".main").toggle("1200");
	$(".login-div").hide();

		$(".menu-bar").css({"width":"0","background-color":"black"});

});

	//close-nav-btn..
$(document).on("click","#close-nav",function(c){
		c.preventDefault();
		// $(".menu-bar").html("");
		$(".menu-bar").css({"width":"0","background-color":"black"});


	});

$(".menu_btn").on("click",function(){
	$(".menu-bar").css({"width":"250px","background-color":"lightblue"});

});
//function for loader..
function loader(){
$('.loader').css({'display':'block'})
	
}//loader
function stop_loader(){
setTimeout(function(){
$('.loader').css({'display':'none'})

},1200)
}//stpl.

});//r





