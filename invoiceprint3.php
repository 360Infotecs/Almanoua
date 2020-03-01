<!DOCTYPE html>
<?php
	session_start();
	include("common/DBCon.php");
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
			
			<title>Al Manoua Invoice System</title>
			
			<!-- Bootstrap -->
			<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- Font Awesome -->
			<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<!-- NProgress -->
			<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
			
			<!-- Custom Theme Style -->
			<link href="build/css/custom.min.css" rel="stylesheet">
		</head>
		
		<style type="text/css">
			 
 html, body {
      height: 100%;
      overflow: hidden;
    }

   .wrapper {
      position: absolute;
      padding:10px 15px 10px 15px;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      border: 1px solid black;
    }
			 
			 </style>
		
		<body onload="window.print();">
			<div class="wrapper">
				<!-- Main content -->
	<?php
	global $con;
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
									
									
								</div>
								<!--<h2>Customer Invoice</h2>-->
								
								
								<div align="center">
											<!--<h2>Customer Invoice</h2>-->
											<p><h5><address><h2 ><img class="pull-left" style='height:75px; width:200px;' src='images/invoice.png'></h2><br>
												<div class="clearfix"></div>
												<small>No.197, New Tangalle Rd,Kotuwegoda,Matara</small></br>
												<small><small>96/6/N, Senaviratnarama Road, Megoda Kollonnawa Welampitiya, Hot Line: 075-9400039,Tel: 0114674964,   <br>
												E-mail: blackhillsholdings@gmail.com   <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>Blackhills<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i> Blackhills</small>
												<div class="clearfix"></div>
											</div>
									
									</div>
								
								
								<!-- info row -->
								<div class='row invoice-info'>
								  <div class='col-sm-12 invoice-col'>
															<h4>Invoice </h4><small>Invoice No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <?php echo$boom ?></small> </br>
															<small>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;  <?php echo $Date2 ?> </small><br>
															<small>Customer Name &nbsp; :&nbsp; <?php echo $Customer2 ?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<small>Telephone No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $Telephone2 ?> </small></br>
															<small>Sales Done By &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $SalesPerson2 ?> </small></br>
															
															
														</div><!-- /.col -->
								
								<div class="x_title">
														<h2></h2>
														
														<div class="clearfix"></div>
													</div>
								
									<div class='col-sm-12 col-sm-8 invoice-col'>
										
													<div class="clearfix"></div>
													
													<table align="center" style="width:500px;" class="table table-striped table-bordered table-hover" id="TableA">
														<thead class="thin-border-bottom">
															<tr>
																<th>Item Description</th>
																<th>Unit Price</th>
																<th>Quantity</th><!--class="hidden-480"-->
																<th>Sub Total</th>
																
															</tr>
														</thead>
				<?php
					//include("Common/DBCon.php");
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
													 
													 <small>* We are Recommended to use polymer adhesive for laying porcelain</br>
* Shade variations are inherent in ceramic trade, please cheak your tils priorto installation.</br>
* Full Quantity is Not Exchangable, No Cash Refund</br>
</small>
<small> *ඉතිරි භාණ්ඩ හුවමාරැ කිරීම දින 20 ඇතුලත පමණි.</br>
* භාණ්ඩ පරීක්ෂා කර රැගෙන යන්න. පසුව කරන පැමිණිලි බාර ගනු නොලැබේ.</br>
* ටයිල් සවිකිරීමට පෙර අතුරා වෙනස පරීක්ෂා කර බලන්න.</br></small>

</br>
<div class='col-xs-6'>
<small><p>Issued By :- ..............................................</p></small>
</div>
<div class='col-xs-6'>
<small><p> Customer/Dealer Sign :- ..........................................</p></small>
</div>
													
													<small><strong>Payment Method</strong> </br> <strong> Cash payments</strong><br></small>
													<small> Blackhills Holding PVT Ltd</br> 
													<div class="clearfix"></div>
													<div class="clearfix"></div><div class="clearfix"></div>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Thanks for your Business</u>
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