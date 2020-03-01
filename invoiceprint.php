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
								<div class='pull-right'>
									
									<h5><mark>INVOICE DETAILS</mark></h5>
									Invoice No:<?php echo $boom?></br>
									Invoice Date:<?php echo $Date2 ?></br>
									Issue Date
								</div>
								<!--<h2>Customer Invoice</h2>-->
								
								
								<p><h5><address><h2><img style='height:75px; width:200px;' src='images/invoice.png'></h2><br>
									<div class="clearfix"></div>
									
									
									<strong> A </strong> 96/6/N, Senaviratnarama Road, Megoda Kollonnawa Welampitiya,   <br>
									<strong> E</strong> blackhillsholdings@gmail.com  <br>
									<strong>P</strong> 075-9400039/0114674964,
									
									</div>
								
								
								<!-- info row -->
								<div class='row invoice-info'>
									<div class='col-sm-12 col-sm-8 invoice-col'>
										
													<div class="clearfix"></div>
													
													<table class="table table-striped table-bordered table-hover" id="TableA">
														<thead class="thin-border-bottom">
															<tr>
																<th>Item Description</th>
																<th>Unit Price</th>
																<th>Quantity</th><!--class="hidden-480"-->
																<th>Sub Total</th>
																
															</tr>
														</thead>
				<?php
					include("Common/DBCon.php");
					//global $con;
					
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
																<th colspan="3">Total Charge</th>
																<th><label id="sotocharge" name='sotocharge' style='color:red;'><?php echo $Total?></label></th>
																
															</tr>
														</tfoot>
													</table>
													
													
													<small><strong>Payment Method</strong> </br> <strong> Cash payments</strong><br></small>
													<small> Blackhills Holding PVT Ltd</br> <strong>We Accept</strong><br></small>
													<small>Paypal Visa,Master card,Payoneer</small>
													<div class="clearfix"></div>
													<small><strong>Terms & Condition</strong></br>Customer will be billed after the acceptance of this quote</br></small>
													<div class="clearfix"></div>
													<div class="clearfix"></div><div class="clearfix"></div>
													<u>Thanks for your Business</u>
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