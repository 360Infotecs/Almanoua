<?php
	session_start();
	include("common/DBCon.php");
	include("common/sidebar_pro_pic.php");
	include("functions.php");
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
			
			<title>BlackHills | Invoice </title>
			<!--Ajax reference--->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			
			<link rel="stylesheet" href="js/jquery-ui.js" />
			<!-- Bootstrap -->
			<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- Font Awesome -->
			<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<!-- NProgress -->
			<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
			
			<!-- Custom Theme Style -->
			<link href="build/css/custom.min.css" rel="stylesheet">
		</head>
		
		<body class="nav-md">
			<div class="container body">
				<div class="main_container">
					<div class="col-md-3 left_col">
						<div class="left_col scroll-view">
							<div class="navbar nav_title" style="border: 0;">
								<a href="index.php" class="site_title"><img  class='' style='height:61px; width:42px;' src='images/logo.png'> <span>BlackHills</span></a>
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
									<h3>Invoice Preview</h3>
									
								</div>
								
								
							</div>
							
							<div class="clearfix"></div>
							
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div class="pull-right">
											<img style='height:100px; width:100px;' src='images/1415.jpg'>
										</div>
										<div align="center">
											<!--<h2>Customer Invoice</h2>-->
											<p><h5><address><h2><img style='height:75px; width:200px;' src='images/invoice.png'></h2><br>
												<div class="clearfix"></div>
												
												96/6/N, Senaviratnarama Road, Megoda Kollonnawa Welampitiya, Hot Line: 075-9400039,Tel: 0114674964,   <br>
												E-mail: blackhillsholdings@gmail.com   <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>Blackhills<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i> Blackhills
												<div class="clearfix"></div>
											</div>
											<div class="x_title">
												<h2></h2>
												
												<div class="clearfix"></div>
											</div>
											<div class="x_content">
												
												<?php
													global $con;
													
													$prid = $_GET['id'];
													
													$sea_pay = mysqli_query($con, "SELECT * FROM invoiceorder WHERE InvoId = $prid");
													
													while ($payresults = $sea_pay->fetch_assoc()){
														//echo "<script>alert('payment')</script>";
														$IoId = $payresults['IoId'];
														$InvoId = $payresults['InvoId'];
														$Date = $payresults['Date'];
														$SalesPerson = $payresults['SalesPerson'];
														$Telephone = $payresults['Telephone'];
														$Customer = $payresults['Customer'];
														$CurrentPayment = $payresults['CurrentPayment'];
														$Balance = $payresults['Balance'];	
														
													}						
													
												?>
												<form class="form-horizontal form-label-left input_mask" action="" method="post" enctype="multipart/form-data">
													
													
													<div class='row invoice-info'>
														<div class='col-sm-12 invoice-col'>
															<h3><b>Invoice </b></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Invoice No&nbsp;:</b>&nbsp; <?php echo$InvoId ?> </br>
															<b>Customer Name &nbsp; :&nbsp;</b> <?php echo $Customer ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;  <?php echo $Date ?> </b><br>
															
															
															<b>Telephone No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $Telephone ?> </br>
															<b>Sales Done By &nbsp;&nbsp;&nbsp;&nbsp; :</b> <?php echo $SalesPerson ?> </br>
															
															
														</div><!-- /.col -->
														<div class='col-sm-6 invoice-col'>
															
														</div><!-- /.row -->						
														<div class="x_title">
															<h2></h2>
															
															<div class="clearfix"></div>
														</div>
														
														
														<div class="form-group">
															
															
															<div class="vspace-12-sm"></div>
															
															<div class="col-sm-12">
																
																<script src="js/jquery.min.js"></script>
																
																
																
																
																<table class="table table-striped table-bordered table-hover" id="TableA">
																	<thead class="thin-border-bottom">
																		<tr>
																			
																			<th>Item Name</th>
																			<th>Unit Price</th>
																			<th>Quantity</th><!--class="hidden-480"-->
																			<th>Sub Total</th>
																			
																		</tr>
																	</thead>
																	
																	<?php
																		
																		global $con;
																		
																		$stuid = $_GET['id'];
																		
																		$stu_query = "SELECT * FROM invoiceorderitem WHERE InvoId ='$stuid'";
																		
																		$stu_run = mysqli_query($con,$stu_query);
																		
																		//$count=mysql_num_rows($stu_run);
																		
																		while($sorows = mysqli_fetch_array($stu_run)){
																											
																			
																			$Item_Id = $sorows['Item_Id'];
																			$ItemDescription = $sorows['ItemDescription'];
																			$UnitPrice = $sorows['UnitPrice'];
																			$Quantity = $sorows['Quantity'];
																			$SubTotal = $sorows['SubTotal'];
																			$Total = $sorows['Total'];
																			
																			
																			
																			echo "						<tbody>
																			<tr>
																			<td>$ItemDescription</td>
																			<td>$UnitPrice</td>
																			<td>$Quantity</td>
																			<td>$SubTotal</td>
																			
																			</tr>
																			</tbody>
																			
																			";
																		}
																		
																	?>
																	<tfoot>
																		<tr>
																			<th colspan="3">Net Total</th>
																			<th><label id="sotocharge" name="sotocharge" style="color:red;" "><?php echo $Total?></label></th>
																				
																				</tr>
																				</tfoot>
																				</table>
																				
																				</div><!-- /.col -->
																			</div>
																		</div>	
																		<div class="form-group">
																			<!--<h2>Customer Invoice</h2>-->
																			
																		</div>
																		
																		
																		<div class="form-group">
																			
																			<div class="pull-right">
																				
																				<button type="submit" name="btnSubmit" class="btn btn-danger"><i class="fa fa-print"></i>Print Invoice</button>
																				<!--<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>-->
																			</div>
																			
																		</div>
																	</div>
																	
																	
																</form>
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
									</body>
								</html>
<?php
global $con;
																		
	$stuid = $_GET['id'];
																		
		$sql = "SELECT * FROM invoiceorderitem WHERE InvoId ='$stuid'";
																		
			$results = mysqli_query($con,$stu_query);															
				while($sorows = mysqli_fetch_array($results)){
																											
																			
						$Item_Id = $sorows['Item_Id'];
						$ItemDescription = $sorows['ItemDescription'];
						$UnitPrice = $sorows['UnitPrice'];
						$Quantity = $sorows['Quantity'];
						$SubTotal = $sorows['SubTotal'];
						$Total = $sorows['Total']; 
											
						$count=mysql_num_rows($sorows);
	for($i=0;$i<$count;$i++){ 
	global $con;
$insert_query = "UPDATE bincard SET QtyBalance='$Quantity[$i]',QtyIssued='$SubTotal[$i]' WHERE BinId = $Item_Id[$i]";
$result1=mysql_query($insert_query); 
} 
 if ($con->query($result1) === TRUE) 
		{
			echo"<script>alert(' Updated Successfully')</script>";
			echo"<script>window.open('invoiceprint.php','_self')</script>";
		} else 
		{
			echo "Error: " . $insert_query . "<br>" . $con->error;
		}
				}
	$con->close();
				
	

									
							/*		
									$stuid = $_GET['id'];
									global $con;
									
									$stu_query = "SELECT * FROM invoiceorderitem WHERE InvoId ='$stuid'";
									
									$stu_run = mysqli_query($con,$stu_query);
									
									while($sorows = mysqli_fetch_array($stu_run)){
										
										
										$Item_Id = $sorows['Item_Id'];
										$ItemDescription = $sorows['ItemDescription'];
										$UnitPrice = $sorows['UnitPrice'];
										$Quantity = $sorows['Quantity'];
										$SubTotal = $sorows['SubTotal'];
										$Total = $sorows['Total'];
									}
										
										$sea_res = "select * FROM bincard WHERE BinId = '$Item_Id'";
										$results = mysqli_query($con,$sea_res);
										
										while ($rows = mysqli_fetch_array($results)){
											//echo "<script>alert('reservation')</script>";
											$BinId = $rows['BinId'];
											$ItemName = $rows['ItemName'];
											$QtyBalance = $rows['QtyBalance'];
											$QtyIssued = $rows['QtyIssued'];
											
											$newqty=0;
											$isuqty=0;
											
											$newqty =$QtyBalance - $Quantity;
											$isuqty = $QtyIssued + $Quantity;
											
											$count=mysql_num_rows($results);
											//chech this
											for($i=0;$i<$count;$i++){ 
												$insert_query = "UPDATE bincard SET QtyBalance='$newqty[$i]',QtyIssued='$isuqty[$i]' WHERE BinId = $Item_Id[$i]";
												$result1=mysql_query($insert_query); 
											}
										} 
									
										
									if ($con->query($result1) === TRUE) 
									{
										echo"<script>alert(' Updated Successfully')</script>";
										echo"<script>window.open('invoiceprint.php','_self')</script>";
									} else 
									{
										echo "Error: " . $insert_query . "<br>" . $con->error;
									}
									
									
									
									$con->close();
							
							
							
							
							
							*/
							
							
						?>
					<?php } ?>																													