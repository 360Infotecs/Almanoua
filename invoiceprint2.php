<!DOCTYPE html>
<?php
	session_start();
	
	if(!isset($_SESSION['user_name'])){
		header("location: login.php");
	}
	else
	{
		
	?>
	<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<!-- Meta, title, CSS, favicons, etc. -->
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<title>BlackHills | Invoice Print Prview</title>
			
			<!-- Bootstrap -->
			<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- Font Awesome -->
			<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<!-- NProgress -->
			<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
			
			<!-- Custom Theme Style -->
			<link href="build/css/custom.min.css" rel="stylesheet">
		</head>
		
		<body onload="window.print();">
			<div class="wrapper">
				<!-- Main content -->
	<?php
	include("Common/DBCon.php");
	$boom = $_GET['id'];
	$sopfetch = mysqli_query($con, "SELECT * FROM invoiceorder WHERE InvoId = '$boom'");
		while($soprows = mysqli_fetch_array($sopfetch)){
			//$InvoId2 = $soprows['InvoId'];
			$Date2 = $soprows['Date'];
			$SalesPerson2 = $soprows['SalesPerson'];
			$Telephone2 = $soprows['Telephone'];
			$Customer2 = $soprows['Customer'];
			$CurrentPayment2 = $soprows['CurrentPayment'];
			$Balance2 = $soprows['Balance'];
		
		}
		
		
		
					
					
					
	?>
				<div class='row'>
					<div class='col-xs-12'>
						<!-- Main content -->
						<section class='invoice'>
							<!-- title row -->
							<div class="x_title">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
									<div class="pull-right">
											<img style='height:100px; width:100px;' src='images/1415.jpg'>
											</div>
										<div align="center">
											<!--<h2>Customer Invoice</h2>-->
											<p><h5><address><h2 ><img class="pull-left" style='height:75px; width:200px;' src='images/invoice.png'></h2><br>
												<div class="clearfix"></div>
												
												<small>96/6/N, Senaviratnarama Road, Megoda Kollonnawa Welampitiya, Hot Line: 075-9400039,Tel: 0114674964,   <br>
												E-mail: blackhillsholdings@gmail.com   <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>Blackhills<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i> Blackhills</small>
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
															<h4>Invoice </h4><small>Invoice No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <?php echo$InvoId ?></small> </br>
															<small>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;  <?php echo $Date ?> </small><br>
															<small>Customer Name &nbsp; :&nbsp; <?php echo $Customer ?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<small>Telephone No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $Telephone ?> </small></br>
															<small>Sales Done By &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $SalesPerson ?> </small></br>
															
															
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
															<div class="center">
															<script src="js/jquery.min.js"></script>
															
															
															
															
															<table align="center" style="width:420px;" class="table table-striped table-bordered table-hover" id="TableA">
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
					
					$stu_query = "SELECT * FROM invoiceorder INNER JOIN invoiceorderitem ON invoiceorder.InvoId = invoiceorderitem.InvoId WHERE invoiceorder.InvoId ='$stuid'";
					
					$stu_run = mysqli_query($con,$stu_query);
					
					while($sorows = mysqli_fetch_array($stu_run)){
						$Date = $sorows['Date'];
						$SalesPerson = $sorows['SalesPerson'];
						$Telephone = $sorows['Telephone'];								
						$Customer = $sorows['Customer'];								
						$CurrentPayment = $sorows['CurrentPayment'];								
						$Balance = $sorows['Balance'];								
						
						
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
																		<div class="form-group" class="align-center">
											<!--<h2>Customer Invoice</h2>-->
											<small><strong>Payment Method</strong> </br> <strong> Cash payments</strong><br></small>
													<small> Blackhills Holding PVT Ltd</br> <strong>We Accept</strong><br></small>
													<small>Paypal Visa,Master card,Payoneer</small>
													<div class="clearfix"></div>
													<small><strong>Terms & Condition</strong></br>Customer will be billed after the acceptance of this quote</br></small>
													<div class="clearfix"></div>
													<div class="clearfix"></div><div class="clearfix"></div>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Thanks for your Business</u>
											
																			</div>
																	
																	
																	
												</div>
																
																
															</form>
														</div>
													</div>
												</div>
													
													
													
												</div><!-- /.col -->
												
												
											</div><!-- /.row -->
											
											
											
											
										</div><!-- /.row -->
		
									</section>
								</div><!-- /.col -->
								</div><!-- /.row -->
								</div><!-- ./wrapper -->
							</body>
						</html>
					<?php } ?>					