<?php
	session_start();
	date_default_timezone_set('Asia/Colombo');
	include("common/DBCon.php");
	include("common/sidebar_pro_pic.php");
	if(!isset($_SESSION['user_name'])){
		header("location: login.php");
	}
	else
	{
	?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<!-- Meta, title, CSS, favicons, etc. -->
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<title>Al Manoua Invoice System</title>
			
			<!-- Bootstrap -->
			<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- Font Awesome -->
			<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<!-- NProgress -->
			<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<!-- Custom Theme Style -->
			<link href="build/css/custom.min.css" rel="stylesheet">
		</head>
		
		<body class="nav-md">
			<div class="container body">
				<div class="main_container">
					<div class="col-md-3 left_col">
						<div class="left_col scroll-view">
							<div class="navbar nav_title" style="border: 0;">
							<a href="index.php" class="site_title"><img  class='' style='height:61px; width:60px;' src='images/zm.png'> <span>Al Manoua</span></a>
							</div>
							
							
							
							<div class="clearfix"></div>
							
							<!-- menu profile quick info -->
							<div class="profile clearfix">
								<div class="profile_pic">
									<?php echo "<img src='images/users/$u_img'  class='img-circle profile_img'/>"; ?>
								</div>
								<div class="profile_info">
									<span>Welcome,</span>
									<h2><?php echo $_SESSION['user_name'];?></h2>
								</div>
								<div class="clearfix"></div>
							</div>
							<!-- /menu profile quick info -->
							
							<br />
							
							<!-- sidebar menu -->
							<?php include("common/sidebar.php");?>
							<!-- /sidebar menu -->
							
							<!-- /menu footer buttons -->
							<div class="sidebar-footer hidden-small">
								<a data-toggle="tooltip" data-placement="top" title="Settings">
									<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
								</a>
								<a data-toggle="tooltip" data-placement="top" title="FullScreen">
									<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
								</a>
								<a data-toggle="tooltip" data-placement="top" title="Lock">
									<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
								</a>
								<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
									<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
								</a>
							</div>
							<!-- /menu footer buttons -->
						</div>
					</div>
					
					<!-- top navigation -->
					<?php include("common/navbar.php");?>
					<!-- /top navigation -->
					
					<!-- page content -->
					<div class="right_col" role="main">
						<div class="">
							<div class="page-title">
								<div class="title_left">
									<h3>New Item </h3>
								</div>
								
								
							</div>
							
							<div class="clearfix"></div>
							
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											<h2>Item Informations</h2>
											
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<form class="form-horizontal form-label-left input_mask"  method="post" enctype="multipart/form-data">
												
												
												
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-3">Date</label>
													<div class="col-md-9 col-sm-9 col-xs-9">
														<input type="text" class="form-control" value="<?php echo date('Y-m-d ');?>" name="DateRecieved" data-inputmask="'mask': '99/99/9999'">
														
													</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Item Name</label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" name="ItemName" placeholder="Item Name">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Item Code</label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" id="item_code" name="ItemCode" placeholder="Item Code">
													</div>
												</div>
												
													
												
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Item Size</label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" name="ItemSize" placeholder="Item Size">
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity</label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control"  id="QuantityBalanced" name="QuantityBalanced" placeholder="Quantity">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Cost Price</label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control"  id="CostPrice" name="CostPrice" placeholder="Cost Price">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Selling price</label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control"  id="SellingPrice" name="SellingPrice" placeholder="Selling price">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Discounted Price</label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control"  id="DiscountedPrice" name="DiscountedPrice" placeholder="Discounted Price">
													</div>
												</div>
												
												
												
												
												
												<div class="ln_solid"></div>
												
												<div class="form-group">
													<div class="pull-right">
														
														<button type="submit" name="btnsave"class="btn btn-success">Save</button>
													</div>
													
												</div>
											</div>
											
										</form>
										
										<div class="row">
											
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="x_panel">
													<div class="x_title">
														<h2>Item Details</h2>
														<ul class="nav navbar-right panel_toolbox">
															<li><a class="collapse-link"><i class="fa fa-chevron-up" style="visibility:hidden;"></i></a>
															</li>
															<li class="dropdown">
																<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench" style="visibility:hidden;"></i></a>
																
															</li>
															<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
															</li>
														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="x_content">
														
														<table id="datatable-buttons" class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th><center>Date</center></th>
																	<th><center>Item Name or Item Code</center></th>
																	<th><center>Item Size</center></th>
																	<th><center>Quantity</center></th>
																	<th><center>Price</center></th>
																	<th><center>Edit Details</center></th>	
																</tr>
															</thead>
															
															
															<tbody>
																
																<?php			
																	$get_user = "select * from bincard";				
																	$result = mysqli_query($con,$get_user);
																	
																	$i=0;
																	
																	while($row = mysqli_fetch_array($result))
																	{
																		
																		$sup_id = $row['BinId'];
																		$date = $row['DateRecieved'];
																		$item_name = $row['ItemName'];
																		$ItemCode = $row['ItemCode'];
																		$item_size = $row['ItemSize'];
																		$qty = $row['QtyBalance'];
																		$price = $row['StockPrice'];
																		$sell_price = $row['SellingPrice'];
																		$dis_price = $row['DiscountPrice'];
																		
																		$i++;
																		
																	?>
																	<tr>
																		<td style='padding:40px;'><center><?php echo $date; ?></center></td>
																		<td style='padding:40px;'> <center><?php echo $item_name;?><br> Item Code-<?php echo $ItemCode; ?> </center></td>
																		<td style='padding:40px;'><center><?php echo $item_size;?></center></td>
																		<td style='padding:40px;'><center><?php echo $qty; ?></center></td>
																		<td style='padding:40px;'><center>Stock - <?php echo $price; ?> <br> Selling - <?php echo $sell_price; ?> <br> Discount - <?php echo $dis_price; ?></center></td>
																	<td style='padding:40px;'><center><a href = "edit_item.php?edit_item=<?php echo $sup_id; ?>" class="btn btn-primary"/>Edit</a></center></td>	
																	
																</tr>
															<?php }?>
															
														</tbody>
													</table>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->
			
			<!-- footer content -->
			<?php include("common/footer.php");?>
			<!-- /footer content -->
		</div>
	</div>
	
	<!-- jQuery -->
	<script src="vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="vendors/nprogress/nprogress.js"></script>
	
	<!-- Custom Theme Scripts -->
	<script src="build/js/custom.min.js"></script>
	
	<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	<script src="vendors/jszip/dist/jszip.min.js"></script>	
	<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
	
</body>
</html>
<?php 
	include("common/DBCon.php");
	
	if(isset($_POST['btnsave'])){ 
		
		
		$DateRecieved = $_POST['DateRecieved'];
		$ItemName = $_POST['ItemName'];
		
		$ItemCode = $_POST['ItemCode'];
		$ItemSize = $_POST['ItemSize'];
		
		
		$QuantityBalanced = $_POST['QuantityBalanced'];
		
		$CostPrice = $_POST['CostPrice'];
		$SellingPrice = $_POST['SellingPrice'];
		$DiscountedPrice = $_POST['DiscountedPrice'];
		
		if($ItemCode != ''){
			$ItemCode_checking = mysqli_query($con, "SELECT * FROM bincard WHERE ItemCode = '$ItemCode'");
			
			$results = mysqli_num_rows($ItemCode_checking);
			
			if($results>0){
				echo "
				<script>alert('ItemCode is Already Added !!Please Update!!')</script>
				<script>window.open('additem.php','_self')</script>
				";
				}else{
				$insert_query = "insert into bincard (DateRecieved,ItemName,ItemCode,ItemSize,QtyBalance,StockPrice,DiscountPrice,SellingPrice) values ('$DateRecieved','$ItemName','$ItemCode','$ItemSize','$QuantityBalanced','$CostPrice','$DiscountedPrice','$SellingPrice')";
				
				
				if ($con->query($insert_query) === TRUE) 
				{
					echo"<script>alert('Item Added Successfully')</script>";
					echo"<script>window.open('additem.php','_self')</script>";
				} else 
				
				{
					echo "Error: " . $insert_query . "<br>" . $con->error;
				}
				
				$con->close();
			}
		}
	}
	
	
	
?>
<?php } ?>									