
 <?php


  session_start();
//databace connection..
class dataBase{
	private $server = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db_name = 'invoice';
	private $db_con;
	protected function connect(){
		$this->db_con = new PDO("mysql:host=".$this->server."; dbname=".$this->db_name, $this->user , $this->pass);
	return $this->db_con;

	}
}
//this class will do ..= fetchdata for(display,search,etc..)
class querys extends dataBase{
//function for query it will select data..to edit etc..
  function fetch_data(){

try {

if (isset($_SESSION['c_user_id'])) {

        //..........it will show menu on all pages for login/unlogined user..
  if (isset($_POST['menu'])) {
    if ($_POST['menu']=="menu") {
    echo true;
  }

}


		
  //this action comming from jqery..
		if (isset($_POST['action'])) {

			$sql = "";

//it will search data..
			if ($_POST['action']=="search_data") {
				$search = $_POST['search'];
        $search_trim = trim($search);
				$sql.="SELECT * FROM p_data WHERE p_name LIKE '%".$search_trim."%'";
			}


      elseif ($_POST['action'] == 'get_id') {
      $e_id = $_POST['edit_id'];
    $sql.= "SELECT * FROM p_data  RIGHT  JOIN invoice_table
      ON 
      p_data.p_id = invoice_table.in_fk
      WHERE p_data.p_id= '".$e_id."'";

      }

      //this is for edit invoice creator profile..
			elseif ($_POST['action'] == "get_c_id") {
				$ses_ids = $_SESSION['c_user_id'];
 		$sql.= "SELECT * FROM creator WHERE c_id = '".$ses_ids."' ";
			}

      //this is for display chart ..
      elseif ($_POST['action'] == "chart") {
           $sql.= " SELECT SUM(qauntity) AS ch_q , 
           SUM(discount) AS ch_d , 
           SUM(f_total) AS ch_ft ,
          SUM(f_total) as ch_ft ,
          SUM(val_a) as val_a ,
          SUM(val_b) as val_b  FROM invoice_table WHERE creator_fk = 
           '".$_SESSION['c_user_id']."' ";

      }


		$stmt= $this->connect()->query($sql);
		$stmt->execute();
	
	if ($stmt) {

		$result=$stmt->fetchAll();
			echo json_encode($result);			
      }

		 else {
      echo json_encode(array("dataMsg" => "data not found" , "status" => false));
			//remember to do..action=="load.."
	}

  }
}

} catch (Exception $q) {
	echo "error : ".$q->getMessage();
}

		
				
	}//f-d

  //function limit data show..
function limit_show(){
  if (isset($_POST['actions'])) {
    if ($_POST['actions'] == "loads") {
      $limit = 26 ; 
      $page = "";
      if (isset($_POST['page_no'])) {
         $page = $_POST['page_no'];
       } else{$page = 1 ;}
       $offset = ($page - 1)*$limit ;
       $limit_sql = "SELECT * FROM p_data LIMIT {$offset},{$limit}";
       $limit_stmt = $this->connect()->prepare($limit_sql);
       $limit_stmt->execute();
       $limit_r_c = $limit_stmt->rowCount();
       if ($limit_r_c > 0) {
        $output = "" ;
        $output.='<table class="table table-bordered table-hover" id="load-data">';
        $output.='<tbody id="load-tab">';
           $output.='<thead>
    
      <tr style="background-color: cadetblue;color:white;">
      <th>id</th>
      <th>name</th>
      <th>lname</th>
      <th>dr:name</th>
      <th>num</th>
      <th>Edit</th>

      <th><button class="btn btn-danger btn-sm" id="delete-btn">delete</button></th>
      <th>Export</th>
      
    </tr>
</thead>
';
         while ($limit_res = $limit_stmt->FETCH(PDO::FETCH_ASSOC)) {
          // print_r($limit_res);
         $output.='<tr align="center">';
      $output.= "<td>".$limit_res['p_id']."</td>";
      $output.= "<td>".$limit_res['p_name']."</td>";
      $output.= "<td>".$limit_res['p_lname']."</td>";
      $output.= "<td>".$limit_res['p_dr']."</td>";
      $output.= "<td>".$limit_res['p_num']."</td>";
      $output.="<td><button  class='btn btn-info btn-sm edit-btn'  data-eid = '".$limit_res['p_id']."'>edit</button></td>";
      $output.= '<td><input type="checkbox" name="checkbox" value="'.$limit_res['p_id'].'"></input></td>';
  $output.='<td><button id="exp-btn" class="btn btn-success btn-sm exp-btn"  data-eid="'.$limit_res['p_id'].'">export-data</button></td>';

         $output.='</tr>';




         }//whi
        $output.='</tbody>';

         $output.='</table>';


       }
$total_sql = "SELECT * FROM p_data";
 $total_query = $this->connect()->query($total_sql);
  $total_num_r = $total_query->rowCount();
  $total_page = ceil($total_num_r/$limit);
  // $output = "" ;
  
$output.='<div id="pagination" style=" letter-spacing: 5px;">';

for ($i=1; $i <=$total_page ; $i++) {

if ($i == $page) {
   $class="btn btn-danger";
 } else{$class="btn btn-success" ;}
  $output.='<a href="#" class="'.$class.'" type="button" id="'.$i.'">'.$i.'</a>'.'<span> </span>';

  }//for
      $output.='</div>';







      echo $output;
    }
  }
}//func

//function for insert the data of client i.e purches details..
function insert(){
	try {
		
	//client persnol detalis..
	if (isset($_POST['p_name'])) {
        $cn = new PDO('mysql:dbname=invoice;host=localhost', 'root', '');


		$ins_sql = "INSERT INTO p_data(c_fk,p_name,p_lname,p_dr,p_num,total_form_rows)VALUES
    (:c_fk,:p_name,:p_lname,:p_dr,:p_num,:total_form_rows)";

  	// $ins_stmt = $this->connect()->prepare($ins_sql);
  $ins_stmt = $cn->prepare($ins_sql);
    $ins_stmt->bindparam(":c_fk",$c_fk);

		$ins_stmt->bindparam(":p_name",$p_name);
		$ins_stmt->bindparam(":p_lname",$p_lname);
		$ins_stmt->bindparam(":p_dr",$p_dr);
		$ins_stmt->bindparam(":p_num",$p_num);
		$ins_stmt->bindparam(":total_form_rows",$total_form_rows);

    $c_fk = $_SESSION['c_user_id'];

		$p_name = $_POST['p_name'];
		$p_lname = $_POST['p_lname'];
		$p_dr = $_POST['p_dr'];
		$p_num = $_POST['p_num'];
	  $total_form_rows = $_POST['total_forms'];
		
		$ins_stmt->execute();
        if ($ins_stmt) {
      $in_fk = $cn->lastInsertId();//this id is used for insert data according to this id..
    }
    //client purches details..
	$pro_ins = "INSERT INTO invoice_table(in_fk,creator_fk,item_name,qauntity,price,total,discount,taxable_val,rate_a,val_a,rate_b,val_b,f_total)VALUES(:in_fk,:c_fk,:product_name,:qauntity,:price,:total,:discount,:taxable_val,:rate_a,:val_a,:rate_b,:val_b,:f_amt)";
;
$count = ($_POST['total_forms']);
// echo "this is count value : ". $count;
for ($i=0; $i < $count ; $i++){ 
		$data = array(
":in_fk" =>  $in_fk,

":c_fk" => $_SESSION['c_user_id'],

":product_name" => $_POST['product_name'][$i],
":qauntity"=> $_POST['qauntity'][$i],
":price" => $_POST['price'][$i],
":total" => $_POST['total'][$i],
":discount" => $_POST['discount'][$i],
":taxable_val" => $_POST['taxable_val'][$i],
":rate_a" => $_POST['rate_a'][$i],
":val_a" => $_POST['val_a'][$i],
":rate_b" => $_POST['rate_b'][$i],
":val_b" => $_POST['val_b'][$i],
":f_amt" => $_POST['f_amt'][$i]
);

$pro_stmt = $this->connect()->prepare($pro_ins);
$pro_stmt->execute($data);


}
    if ($pro_stmt) {
      echo json_encode(array("dataMsg" => "Data Inserted Success Full..","status" => true));
      }else{
      echo json_encode(array("dataMsg"=>"Some thing is Wrong Cant Insert Data..","status"=>false));

        }
}//

}catch(PDOException $e){
			echo "error : " .$e->getMessage();		
	}

 }
//function for update-query..it will update client all details..
 function updateForm(){
try {
		
		
 		 	if (isset($_POST['p_id_up'])) {

 $user_up_sql = "UPDATE p_data SET p_name=:p_name,p_lname=:p_lname,p_dr=:p_dr,p_num=:p_num,total_form_rows=:total_forms WHERE p_id=:p_id ";

 $update_stmt = $this->connect()->prepare($user_up_sql);
 $update_stmt->bindparam(":p_name",$p_name);
 $update_stmt->bindparam(":p_lname",$p_lname);
 $update_stmt->bindparam(":p_dr",$p_dr);
 $update_stmt->bindparam(":p_num",$p_num);
 $update_stmt->bindparam(":p_id",$p_id);
 $update_stmt->bindparam(":total_forms",$total_forms);

 		 $p_id = $_POST['p_id_up'];

 		 $p_name = $_POST['p_name_up'];
 		 $p_lname = $_POST['p_lname_up'];
 		 $p_dr = $_POST['p_dr_up'];
 		 $p_num = $_POST['p_num_up'];
 		 $total_forms = $_POST['total_form_up'];

 $update_stmt->execute();
 		// echo "p_id reseved".$_POST['p_id_up'];
 		 // $in_id_up = $_POST['in_id_up'];

	$pro_up_sql = "UPDATE invoice_table SET in_fk=:in_fk_up,item_name=:product_name_up,
qauntity=:quantity_up,price=:price_up,
total=:total_up,discount=:discount_up,
taxable_val=:taxable_val_up,rate_a=:rate_a_up,
val_a=:val_a_up,rate_b=:rate_b_up,
val_b=:val_b_up,
f_total=:f_amt_up
WHERE in_id=:in_id_up";


$pro_up_stmt = $this->connect()->prepare($pro_up_sql);

$count_up =$_POST['total_form_up'];




for ($j=0; $j < $count_up ; $j++) { 
$data_up = array(
 	":in_id_up" => $_POST['in_id_up'][$j],
 	":in_fk_up" => $_POST['in_fk_up'][$j],

 	":product_name_up" => $_POST['product_name_up'][$j],
 	":quantity_up" => $_POST['quantity_up'][$j],
 	":price_up" => $_POST['price_up'][$j],

 	":total_up" => $_POST['total_up'][$j],
 	":discount_up" => $_POST['discount_up'][$j],
 	":taxable_val_up" => $_POST['taxable_val_up'][$j],

 	":rate_a_up" => $_POST['rate_a_up'][$j],
 	":val_a_up" => $_POST['val_a_up'][$j],
 	":rate_b_up" => $_POST['rate_b_up'][$j],
 	
 	":val_b_up" => $_POST['val_b_up'][$j],
 	":f_amt_up" => $_POST['f_amt_up'][$j]


);
$pro_up_stmt->execute($data_up);

}
    if ($pro_up_stmt) {
      echo json_encode(array("dataMsg" => "Data Updated Success Full..","status" => true));
      }else{
      echo json_encode(array("dataMsg"=>"Some thing is Wrong Cant Update Data..","status"=>false));

        }



 	}
 	

 	} catch (PDOException $e) {
		echo "error msg : ".$e->getMessage(); 		
 	} 	
 }//upform
  // function for.. delete query...it  will delete client total info
  function del(){
  	if (isset($_POST['action_del'])) {
  	$d_id = $_POST['del_id'];
$del_arr = array();
foreach ($d_id as  $value) {
	$del_arr[] = $value;
}
$del_arr = implode(',', $del_arr);
$del_sql = "DELETE FROM p_data WHERE p_id IN($del_arr)";


$del_stmt = $this->connect()->prepare($del_sql);
$del_stmt->execute();

    if ($del_stmt) {
      echo json_encode(array("dataMsg" => "Data Deleted Success Full..","status" => true));
      }
      else{
      echo json_encode(array("dataMsg"=>"Some thing is Wrong Cant Delete Data..","status"=>false));

        }


 }

} //del fun
}//class

//select:load-table , searching , update

  //invoice creator class for ins,update and select data..
  class in_creator extends dataBase{

//functon for registration to create nvoice..
  	function in_reg(){
  		  	if (isset($_POST['c_fname'])) {
  		  		if ($_POST['c_fname']=="") {
  		  	echo "all fields are required..!";		
  		  		}else{
  		// echo "in_fname is set ".$_POST['in_fname'];
  		  		$c_sql = "INSERT INTO creator(c_fname,c_lname,c_num,c_email)VALUES(:c_fname,:c_lname,:c_num,:c_email)";
  		  		$c_stmt = $this->connect()->prepare($c_sql);

  		  		$c_stmt->bindparam(":c_fname",$c_fname);
  		  		$c_stmt->bindparam(":c_lname",$c_lname);
  		  		$c_stmt->bindparam(":c_num",$c_num);
  		  		$c_stmt->bindparam(":c_email",$c_email);

  		  		$c_fname =  $_POST['c_fname'];
  		  		$c_lname =  $_POST['c_lname'];
  		  		$c_num =    $_POST['c_num'];
  		  		$c_email =  $_POST['c_email'];

          $c_stmt->execute();

          if ($c_stmt) {
            echo "Register Success please Login..";
          }

    }//


  }
}//reg-fun..
//function for login to user
  	function login(){
  		if (isset($_POST['user'])) {
  			// echo "login_submit btn set..";
  			$log_sql = "SELECT * FROM creator WHERE c_user=:c_user AND c_pass=:c_pass";
  			$c_user = $_POST["user"];
  			$c_pass = $_POST["pass"];

  			$log_stmt = $this->connect()->prepare($log_sql);
  			$log_stmt->execute(array(":c_user" => $c_user,":c_pass" => $c_pass));

  			$res = $log_stmt->fetch(PDO::FETCH_ASSOC);
        if ($c_user == $res['c_user'] && $c_pass == $res['c_pass']) {
          $_SESSION["c_user_id"] = $res["c_id"];

      echo json_encode(array("dataMsg" => "Login  Success Full..Please Wait..","status" => true));
          
        }else{
       echo json_encode(array("dataMsg"=>"Some thing is Wrong Cant Login ..","status"=>false));

        }
        

  		}//
  	}
//function for update ..it will update data of invoice creator 
  	function c_update(){
  		if (isset($_POST['c_up_username'])) {
  			$c_up_id = $_POST['c_up_id'];
  			$c_up_username = $_POST['c_up_username'];
  			$c_up_fname = $_POST['c_up_fname'];
  			$c_up_lname = $_POST['c_up_lname'];
  			$c_up_email = $_POST['c_up_email'];
  			$c_up_pass = $_POST['c_up_pass'];
  			$c_up_num = $_POST['c_up_num'];

  			$c_up_sql = "UPDATE creator SET c_fname=:c_up_fname,c_lname=:c_up_lname,c_num=:c_up_num,c_email=:c_up_email,c_user=:c_up_username,c_pass=:c_up_pass WHERE c_id=:c_up_id";
  			$c_up_stmt = $this->connect()->prepare($c_up_sql);
  			$c_up_stmt->execute(array(
  				":c_up_id"=>$c_up_id,
  				":c_up_fname"=>$c_up_fname,
  				":c_up_lname"=>$c_up_lname,
  				":c_up_num"=>$c_up_num,
  				":c_up_email"=>$c_up_email,
  				":c_up_username"=>$c_up_username,
  				":c_up_pass"=>$c_up_pass,


  			));
  			if ($c_up_stmt) {
        echo json_encode(array("dataMsg" => "Data Updated Success Full..","status" => true));
  			}else{
        echo json_encode(array("dataMsg"=>"Some Thing Is Wrong Can't Update Data..!","status"=>false));

        }
  		}
  	}
    // this func will fetch data acording to day,week,month
    function date_wise_data(){
      if (isset($_POST['data_d'])) {

$d_sel='SELECT
(SELECT SUM(qauntity) FROM invoice_table WHERE Date(date) = CURDATE()
 AND creator_fk="'.$_SESSION['c_user_id'].'"
 )AS d_q,
(SELECT SUM(price) FROM invoice_table WHERE Date(date)=CURDATE()
 AND creator_fk="'.$_SESSION['c_user_id'].'"
)AS d_p,
(
  SELECT SUM(qauntity) FROM invoice_table WHERE YEARWEEK(date, 1) = YEARWEEK( CURDATE() - INTERVAL 1 WEEK , 1)
 AND creator_fk="'.$_SESSION['c_user_id'].'"
  )AS w_q,
 (SELECT SUM(price) FROM invoice_table WHERE YEARWEEK(date , 1) = YEARWEEK(CURDATE() - INTERVAL 1 WEEK , 1)
 AND creator_fk="'.$_SESSION['c_user_id'].'"
 )AS w_p,
 (SELECT SUM(qauntity) FROM invoice_table WHERE YEAR(date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
AND MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
 AND creator_fk="'.$_SESSION['c_user_id'].'"
)AS m_q,
(SELECT SUM(price) FROM invoice_table WHERE YEAR(date) = YEAR(CURDATE()-INTERVAL 1 MONTH)AND MONTH(date)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
 AND creator_fk="'.$_SESSION['c_user_id'].'"
)AS m_p,

(SELECT SUM(qauntity) FROM invoice_table WHERE YEAR(date) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))
 AND creator_fk="'.$_SESSION['c_user_id'].'"
)AS y_q,
(SELECT SUM(price) FROM invoice_table WHERE YEAR(date)=YEAR(DATE_SUB(CURDATE(),INTERVAL 1 YEAR)) 
 AND creator_fk="'.$_SESSION['c_user_id'].'"
)AS y_p';


$d_stmt = $this->connect()->prepare($d_sel);
$d_stmt->execute();
// $d_r = $d_res->rowCount();

if ($d_stmt) {
$d_res = $d_stmt->fetchAll();
echo json_encode($d_res);
  
  }
 }
}//f.d


//function for logout..
  	function logout(){
  		if (isset($_POST['logout'])) {
  			if ($_POST['logout'] == "logout") {
  				session_destroy();

  			}
  		}
  	}

}# invoice creator class
//obj for creator..
$creator_obj = new in_creator;

$creator_obj->in_reg();
$creator_obj->login();
$creator_obj->c_update();
$creator_obj->date_wise_data();
$creator_obj->logout();


//obj for client info and so..etc...
 $obj = new querys;

 $obj->fetch_data();
 $obj->limit_show();

$obj->insert();
$obj->updateForm();
$obj->del();

// $obj->selForUpdate();
//select query..


?>
