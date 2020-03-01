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
	
				<div class='row'>
					<div class='col-xs-12'>
						<!-- Main content -->
						<section class='invoice'>
							<!-- title row -->
							<div class="x_title">
								<div class='pull-right'>
									
									<!--<img style='height:100px; width:100px;' src='images/1415.jpg'>-->
								</div>
								<!--<h2>Customer Invoice</h2>-->
								
								
								<div align="center">
											<!--<h2>Customer Invoice</h2>-->
											
											<p><h5><address><h2 ><img class="pull-left" style='height:75px; width:200px;' src='images/invoice.png'><br>Sales Range Statement</h2><br>
												
												
												<div class="clearfix"></div>
											</div>
									
									</div>
								
								
								<!-- info row -->
								<div class='row invoice-info'>
								  
								
								
								
									<div class='col-sm-12 col-sm-8 invoice-col'>
										
													<div class="clearfix"></div>
													
													<div class="table-responsive">
                      <table align="center" style="width:800px;" class="table table-striped jambo_table bulk_action" id="TableA">
                        <thead>
                          <tr class="headings">
                           <!-- <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>-->
                            <th class="column-title">Invoice No </th>
                            <th class="column-title">Invoice Date </th>
                           
                            <th class="column-title">Bill to Name </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Amount </th>
                            
                            
                          </tr>
                        </thead>
<?php
					include("Common/DBCon.php");
					//global $con;
					//$todaysDate = date("Y-m-d");
					$startdate = $_GET['startdate'];
					$enddate = $_GET['enddate'];
					///$stuid = $_GET['id'];WHERE Date = CURDATE()
					$sales = 0;
					$stu_query = "SELECT * FROM invoiceorder where Date BETWEEN '$startdate' and '$enddate'";
					
					$stu_run = mysqli_query($con,$stu_query);
					
					while($sorows = mysqli_fetch_array($stu_run)){
						$InvoId = $sorows['InvoId'];
						$Date = $sorows['Date'];
						$SalesPerson = $sorows['SalesPerson'];
						$Telephone = $sorows['Telephone'];								
						$Customer = $sorows['Customer'];								
						$CurrentPayment = $sorows['CurrentPayment'];								
						$Balance = $sorows['Balance'];	
						$BillValue = $sorows['BillValue'];
						
						
					
					
				
								echo "		<tbody>
											  <tr class='even pointer'>
												<!--<td class='a-center'>
												  <input type='checkbox' class='flat' name='table_records'>
												</td>-->
												<td>1$InvoId  <i class='success fa fa-long-arrow-up'></i></td>
												<td>$Date</td>
											   
												<td>$Customer</td>
												<td>Paid</td>
												<td class='a-right a-right '>Rs.$BillValue</td>
												
											  </tr>       
											</tbody>
														
														";
														
														$sales += $sorows['BillValue'];
					}
														
				?>

                        
						<tfoot>
															<tr class="even pointer">
																<th colspan="4">Total Sales</th>
																<th><label id="sotocharge" name='sotocharge' style='color:red;'>Rs.<?php echo $sales?>.00</label></th>
																
															</tr>
														</tfoot>
                      </table>
					 
													 
													 

</br>
<div class='col-xs-6'>
<small><p>Issued By :- ..............................................</p></small>
</div>
<div class='col-xs-6'>
<small><p> Checked by :- ..............................................</p></small>
</div>
													
													 
													
													<div class="clearfix"></div>
													<div class="clearfix"></div><div class="clearfix"></div>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Thanks for your Business</u>
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