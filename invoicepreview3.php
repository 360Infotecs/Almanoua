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
		
		<body class="nav-md" onload="sql();">
		
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
															<h3><b>Invoice </b></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b >Invoice No&nbsp;:&nbsp; <?php echo$InvoId ?></b> </br>
															<input type="hidden" id="invo" name="invo"  value="<?php echo$InvoId ?>"/>
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
																		<th>ID</th>
																		<th>Item Name</th>
																		<th>Unit Price</th>
																		<th>Quantity</th><!--class="hidden-480"-->
																		<th>Sub Total</th>
																		<th>Update</th>
																	</tr>
																</thead>
																
																
																
<?php
			
					global $con;
					
					$stuid = $_GET['id'];
					
					
					$stu_query = "SELECT * FROM invoiceorder INNER JOIN invoiceorderitem ON invoiceorder.InvoId = invoiceorderitem.InvoId WHERE invoiceorder.InvoId ='$stuid'";
					
					$stu_run = mysqli_query($con,$stu_query);
					$Total=0;
																			
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
					
					if($_SESSION['Designation']=="Admin")
			{
			echo"
				
														<tbody>
														<tr>
													<td>$Item_Id</td>
													<td>$ItemDescription</td>
													<td>$UnitPrice</td>
													<td>$Quantity</td>
													<td>$SubTotal</td>
													<td><center><button type='submit' name='btnDelete' class='btn btn-warning'><i class='fa fa-bin'></i>Update</button></center></td>
													</tr>
														</tbody>
														
														";
					}
					else if($_SESSION['Designation']=="User"){
					echo"<tbody>
														<tr>
													<td>$Item_Id</td>
													<td>$ItemDescription</td>
													<td>$UnitPrice</td>
													<td>$Quantity</td>
													<td>$SubTotal</td>
													
													</tr>
														</tbody>";};
			}
														
				?>
																
																	<tr>
																		<th colspan="4">Net Total</th>
																		<th><label id="sotocharge" name="sotocharge" style="color:red;" onblur="sql();"><?php echo $Total?></label></th>
																			
																			</tr>
																			
																			</table>
																			
																			</div><!-- /.col -->
																		</div>
																	</div>	
																		<div class="form-group">
											<!--<h2>Customer Invoice</h2>-->
											
											</div>
					
																	
																	<div class="form-group">
																	<input type="hidden" id="upd" name="upd" />
																	<!--<input type="text" id="demo" name="demo" />-->
																	<input type="hidden" id="demo2" name="demo2" />
																	<input type="hidden" id="tot" value="<?php echo $Total?>" name="tot" />
																		<div class="pull-right">
																			
																			<button type="submit" name="btnSubmit"  class="btn btn-success"><i class="fa fa-print"></i>Print Invoice</button>
																			<!--<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>-->
																		</div>
																		<div class="pull-right">
																		
																			<?php
																			  
																			
																			if($Total==0){
																			//echo 'helloworld';
																			echo "<button type='submit' name='btnDelete1' class='btn btn-Danger' >Delete</button>";
																			}
																			else
																			{
																		   echo "<button type='submit' name='btnDelete1' class='btn btn-Danger' style='display: none;'>Delete</button>";
																				}
																			?>
																		<!--<button type='submit' name='btnDelete1' class='btn btn-Danger'>Delete</button>";
																			<!--<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>-->
																		</div>
																		
																		
																	</div>
																</div>
																
																
															</form>
															
																														<script type="text/javascript">
		
					function sql() 
					{
						//var xx = document.getElementById("invo").value;
						//var combo="INSERT INTO `invoiceorderitem`(`InvoId`,`Item_Id`,`ItemDescription`,`UnitPrice`,`Quantity`,`SubTotal`,`Total`) VALUES ";
						//var vall =combo;
						var rows = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
						
						var upqrys="UPDATE `bincard` SET `QtyBalance` = CASE `BinId` ";
						var upqrye="ELSE `QtyBalance` END";
						var upqrym ="";
						//var del ="delete from invoiceorder where InvoId = ";
						var del2 ="delete from invoiceorderitem where Item_Id = ";
						//var count="";
						for(var x=0; x<rows; x++)
						{
							var val = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[0].innerHTML;
							var val1 = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[1].innerHTML;
							var val2 = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[2].innerHTML;
							var val3 = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[3].innerHTML;
							var val4 = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[4].innerHTML;
							
							var val5 = document.getElementById("sotocharge").innerHTML;
							//if(x+1 < rows){	combo+= "("+ xx+ ","+ val + ",'"+ val1 +"',"+ val2 +","+ val3 +","+ val4 +","+ val5 +"),";}
							//else{combo+= "("+ xx+ ","+ val + ",'"+ val1 +"',"+ val2 +","+ val3 +","+ val4 +","+ val5 +")";}
							
							upqrym = upqrym + "WHEN "+val+" THEN `QtyBalance`+"+val3+" ";
							
							//del_row = del + xx;
							
							del_row2 = del2 + val;
							
						}
						
					  //document.getElementById("demo").value = del_row;
					  document.getElementById("demo2").value = del_row2;
						document.getElementById("upd").value = upqrys + upqrym + upqrye;
						//alert(document.getElementById("demo").value);
					}
				</script>	
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
 if(isset($_POST['btnSubmit'])){
  $id = $_GET['id'];
 echo"<script>alert('Do you Want To Print?')</script>";
							echo"<script>window.open('invoiceprint3.php?id=$id','_self')</script>";
 
 }
 
	
	if(isset($_POST['btnDelete'])){
  $id = $_GET['id'];
   // $delete_id = $_GET['delete_user']; 
	$updqry = $_POST['upd'];
	//$updqry2 = $_POST['demo'];
	$updqry3 = $_POST['demo2'];
	$sql1 = $updqry;
	//$sql2 = $updqry2;
	$sql3 = $updqry3;
	//$delete_user = "delete from invoiceorder where InvoId ='$id'";
	//$delete_user1 = "delete from invoiceorderitem where InvoId ='$id'";
	
	//$run_delete = mysqli_query($con, $delete_user); 
	//$run_delete1 = mysqli_query($con, $delete_user1);
	$run_update = mysqli_query($con, $sql1); 
	//$run_update2 = mysqli_query($con, $sql2); 
	$run_update3 = mysqli_query($con, $sql3); 
	//here iam doing under constructions//////////////////////////////////////////////////////////////////////////////////////
	
	$sales = 0;
	$stu_query = "SELECT * FROM `invoiceorderitem` ORDER BY `SubTotal` where InvoId = $id"; 
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
						echo"<input type='text' class='form-control' value='$BillValue'>
						</br>
						<input type='text' name='sale' class='form-control' value='$sales'>";
						
						
	}
	$sales += $sorows['BillValue'];
	$sale=$_POST['sale'];
	$stu = "UPDATE invoiceorderitem SET Total= '$sales' where InvoId = $id"; 
	$stu1 = mysqli_query($con,$stu);
	//////// end of constructions////////////////////////////////////////////////////////////////////////////////////////////////
	if($run_update && $run_update3 & $stu1)
	{
		echo"<script>alert('Item Have Been updated !!')</script>";
		echo"<script>window.open('invoicepreview3.php?id=$id', '_self')</script>";
	}
	}			
		
		if(isset($_POST['btnDelete1'])){
		 $id = $_GET['id'];
		$delete_user = "delete from invoiceorder where InvoId ='$id'";
		$run_delete = mysqli_query($con, $delete_user);
		
		if($run_delete)
	{
		echo"<script>alert('Invoice has been deleted !!')</script>";
		echo"<script>window.open('DayReport.php', '_self')</script>";
	}
		}
		
?>
<?php } ?>																								