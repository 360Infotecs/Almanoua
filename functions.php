<?php
	
	// Create connection
	include("common/DBCon.php");
	//echo'yes';
	
	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	
	
	//// getting the cart informations
	function cart(){
		if(isset($_GET['add_cart']))
		{
			
			global $con;
			
			$ip = getIp();
			
			$BinId = $_GET['add_cart'];			
			
			$check_pro =" select * from cart where ip_add='$ip' AND BinId ='$BinId'";	
			
			$run_check = mysqli_query($con,$check_pro);
			
			if (mysql_num_rows($run_check)>0)
			{
				
				echo"";
				
			}
			else{
				
				$insert_pro="insert into cart(BinId,ip_add) values('$BinId','$ip')";
				
				$run_pro= mysqli_query($con,$insert_pro);
				echo"<script>window.open('productsearch.php','_self')</script>";
				
			}				
			
		}
		
	}
	
	//getting the total items
	
	function total_item()
	{
		if(isset ($_GET['add_cart']))
		{
			global $con;
			
			$ip = getIp();
			$get_items =" select * from cart where ip_add ='$ip'";
			$run_items = mysqli_query($con,$get_items);
			
			$count_items= mysqli_num_rows($run_items);
		}
			else{
				global $con;
				$ip = getIp();
			$get_items =" select * from cart where ip_add ='$ip'";
			$run_items = mysqli_query($con,$get_items);
			
			$count_items= mysqli_num_rows($run_items);
				
				
				}
			echo $count_items;	
	}
	
	//getting the total price
	
	function total_price()
	{
	
	$total=0;
	 global $con;
	 
	 
	 $ip = getIp();
	 $sel_price ="select * from cart where ip_add='$ip'";
	 $run_price = mysqli_query($con,$sel_price);
	 
	 while($i_price = mysql_fetch_array($run_price)){
		 
		 $BinId = $i_price['BinId'];
		 
		 $item_price=" select * from bincard where BinId ='$BinId'";
		 
		 $run_item_price = mysql_query($con,$item_price);
		 
		 while($pp_price = mysql_fetch_array($run_item_price))
		 {
			 $selling_price= array( $pp_price['SellingPrice']);
			 
			 $values = array_sum($selling_price);
			 
			 $total += $values;
			 
		 }

		 }
	 
		echo "Rs". $total;
	}
	
	
	///getting user ip adress
	function getIp() {
		$ip = $_SERVER['REMOTE_ADDR'];
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		
		return $ip;
	}
	
	
	
	//getting the products to display	
	
	function getAllItems(){
		
		global $con;
		
		$get_pro =" select * from bincard order by RAND() LIMIT 0,6";
		
		$run_pro = mysqli_query($con,$get_pro);
		
		while($row = mysqli_fetch_array($run_pro))
		{
			$BinId = $row['BinId'];
			$DateRecieved = $row['DateRecieved'];
			$ItemName = $row['ItemName'];
			$ItemCode = $row['ItemCode'];
			$ItemSize = $row['ItemSize'];
			$QtyRecieved = $row['QtyRecieved'];
			$QtyIssued = $row['QtyIssued'];
			$QtyRetured = $row['QtyRetured'];
			$QtyBalance = $row['QtyBalance'];
			$DeliveryOrderNo = $row['DeliveryOrderNo'];
			$CheckedBy = $row['CheckedBy'];
			$StockPrice = $row['StockPrice'];
			$DiscountPrice = $row['DiscountPrice'];
			$SellingPrice = $row['SellingPrice'];
			$image = $row['image'];
			
			
			echo "
			<div class='col-md-6 col-sm-6 col-xs-12 profile_details' >
			<div class='well profile_view' >
			<div class='col-sm-12' >
			<h4 class='brief'><i>Item ID : $BinId</i></h4>
			<div class='left col-xs-7'>
			<h2>$ItemName</h2>
			<p><strong> Item Code : $ItemCode</strong>Item Size : $ItemSize</p>
			<ul class='list-unstyled'>
			<li><i class='fa fa-building'></i> Balance Available: $QtyBalance</li>
			<li><i class='fa fa-phone'></i> Selling Price : $SellingPrice</li>
			<li><i class='fa fa-phone'></i> Discounted Price : $DiscountPrice </li>
			
			</ul>
			</div>
			<div class='right col-xs-5 text-center'>
			<img src='images/items/$image ' alt='' class='img-circle img-responsive'>
			</div>
			</div>
			<div class='col-xs-12 bottom text-center'>
			
			<div class='col-xs-12 col-sm-6 emphasis'>
			<button type='button' class='btn btn-success btn-xs'> <i class='fa fa-user'>
			</i> <i class='fa fa-comments-o'></i> </button>
			<a href='productsearch.php?add_cart= $BinId'>
			<button type='button' class='btn btn-primary btn-xs'>
			<i class='fa fa-user'> </i> Add to Cart
			</button></a>
			</div>
			</div>
			</div>
			</div>";
		}
		
	}
	
	
	
	
	
	
	
?>