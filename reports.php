<?php
	session_start();
	include("common/DBCon.php");
	include("functions.php");
	include("common/sidebar_pro_pic.php");
	$query = "SELECT * FROM invoiceorder ORDER BY IoId desc LIMIT 15";
	$sql = mysqli_query($con, $query);
	
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
			
			<title>BlackHills |Reports </title>
			
			<!-- Bootstrap -->
			<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- Font Awesome -->
			<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<!-- NProgress -->
			<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
			
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
			
			
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
									<h3>Reports </h3>
								</div>
								
								
							</div>
							
							<div class="clearfix"></div>
							
							<div class="row">
								
								
								<div class="container">							
									<br/>
									<br/>
									<div class="col-md-2">
										<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
									</div>
									<div class="col-md-2">
										<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
									</div>
									<div class="col-md-8">
										<input type="button" name="range" id="range" value="Range" class="btn btn-success"/>
									</div>
									<div class="clearfix"></div>
									<br/>
									<div id="purchase_order">
										<table class="table table-bordered">
											<tr>
												<th width="3%">Invoice Id</th>
												<th width="10%">Date</th>
												<th width="10%">SalesPerson</th>
												<th width="5%">Customer</th>
												<th width="8%">Amount</th>
											</tr>
											<?php
												while($row= mysqli_fetch_array($sql))
												{
												?>
												<tr>
													<td><?php echo $row["InvoId"]; ?></td>
													<td><?php echo $row["Date"]; ?></td>
													<td><?php echo $row["SalesPerson"]; ?></td>
													<td><?php echo $row["Customer"]; ?></td>
													<td>Rs <?php echo $row["BillValue"]; ?></td>
												</tr>
												<?php
												}
											?>
										</table>
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
	
		
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
		<!-- Script -->
		<script>
			$(document).ready(function(){
				$.datepicker.setDefaults({
					dateFormat: 'yy-mm-dd'
				});
				$(function(){
					$("#From").datepicker();
					$("#to").datepicker();
				});
				$('#range').click(function(){
					var From = $('#From').val();
					var to = $('#to').val();
					if(From != '' && to != '')
					{
						$.ajax({
							url:"range.php",
							method:"POST",
							data:{From:From, to:to},
							success:function(data)
							{
								$('#purchase_order').html(data);
							}
						});
					}
					else
					{
						alert("Please Select the Date");
					}
				});
			});
		</script>
		
	</body>
</html>

<?php } ?>																						