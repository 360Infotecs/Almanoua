<?php
	session_start();
	include("common/DBCon.php");
	include("common/sidebar_pro_pic.php");
	if(!isset($_SESSION['user_name'])){
		header("location: login.php");
	}
	else
	{
		
if(isset($_GET['edit_supplier'])){

$get_sup_id = $_GET['edit_supplier']; 

$get_sup_pro = "select * from supplier where SupId='$get_sup_id'";

$run_sup_pro = mysqli_query($con, $get_sup_pro); 


$row_sup_pro = mysqli_fetch_array($run_sup_pro);

$sup_id = $row_sup_pro['SupId'];
$com_name = $row_sup_pro['CompanyName'];
$con_person = $row_sup_pro['SupplierName'];
$phone1 = $row_sup_pro['ContactNo1'];
$phone2 = $row_sup_pro['ContactNo2'];
$note = $row_sup_pro['Note'];	


}
?>

	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<!-- Meta, title, CSS, favicons, etc. -->
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<title>BlackHills |Add New Items </title>
			
			  <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
									<h3>User Management </h3>
								</div>
								
								
							</div>
							
							<div class="clearfix"></div>
							
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											<h2>Edit Supplier Informations</h2>
											
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<form class="form-horizontal form-label-left input_mask" method="post" action="" enctype="multipart/form-data">
																																			
												<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
												
												
												
													<input type="text" class="form-control has-feedback-left"  id="inputSuccess2" list="menu" value="<?php echo $com_name; ?>" name="com_name" placeholder="Company Name" >
													<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
													<datalist id="menu">
														<option value='Menu 1'>
															<option value='Menu 2'>
																<option value='Menu 3'>
																	<option value='Menu 4'>
																	</datalist>
																</div>
																
																<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
																	<input type="text" class="form-control" id="inputSuccess2" value="<?php echo $con_person; ?>" name = "con_person" placeholder="Contact Person Name" >
																	<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
																</div>
																
																<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
																	<input type="text" class="form-control has-feedback-left" value="<?php echo $phone1; ?>" name = "phone1" id="inputSuccess2" placeholder="Phone Number 1" >
																	<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
																</div>
																
																<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
																	<input type="text" class="form-control" id="inputSuccess2" value="<?php echo $phone2; ?>" name="phone2" placeholder="Phone Number 2" >
																	<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
																</div>
																
																<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
																	<input type="text" class="form-control" value="<?php echo $note; ?>" id="inputSuccess2" name="note" placeholder="Note">
																	<span class="" aria-hidden="true"></span>
																</div>
																
																<div class="ln_solid"></div>
																
																<div class="form-group">
																	<div class="pull-right">
																		
																		<button type="submit" name="update_supplier" class="btn btn-success">Update</button>
																		<a href = "delete_supplier.php?delete_supplier=<?php echo $sup_id; ?>" class="btn btn-danger"/>Delete</a>
																	</div>
																	
																</div>
															</div>
															
														</form>
													</div>
												</div>
												
																		<?php

if(isset($_POST['update_supplier'])){
		
$update_id = $sup_id;
$com_name = $_POST['com_name'];
$con_person = $_POST['con_person'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$note = $_POST['note'];	

	$update_supplier = "update supplier set CompanyName='$com_name',SupplierName='$con_person',ContactNo1='$phone1',ContactNo2='$phone2',Note='$note' where SupId='$update_id'";
	
	$run_supplier = mysqli_query($con, $update_supplier);
	
	if ($run_supplier){
		echo"<script>alert('Update Successfully !!')</script>";
		echo "<script>window.open('supplier_reg.php','_self') </script>";
	}
		
}


?>

												
													<div class="row">
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Supplier Details</h2>
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
                         <th><center>Comapany Name</center></th>
                          <th><center>Contact Person Name</center></th>
						  <th><center>Phone Num1</center></th>
                          <th><center>Phone Num2</center></th>
                          <th><center>Note</center></th>
						  <th><center>Edit Details</center></th>	
                        </tr>
                      </thead>


                      <tbody>
					  
														<?php			
													$get_user = "select * from supplier";				
														$result = mysqli_query($con,$get_user);
														
														$i=0;
														
														while($row = mysqli_fetch_array($result))
														{
															$sup_id = $row['SupId'];
															$com_name = $row['CompanyName'];
															$con_name = $row['SupplierName'];
															$phone1 = $row['ContactNo1'];
															$phone2 = $row['ContactNo2'];
															$note = $row['Note'];	
															$i++;
														
														?>
															<tr>
															  <td style='padding:40px;'><center><?php echo $com_name; ?></center></td>
															  <td style='padding:40px;'> <center><?php echo $con_name; ?></center></td>
															  <td><center><?php echo $phone1;?></center></td>
															  <td style='padding:40px;'><center><?php echo $phone2; ?></center></td>
															  <td style='padding:40px;'><center><?php echo $note; ?></center></td>
															  <td style='padding:40px;'><center><a href = "edit_supplier.php?edit_supplier=<?php echo $sup_id; ?>" class="btn btn-primary"/>Edit</a></center></td>	
															
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
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
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

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
	<!-- Clear Text Field -->
	<script type="text/javascript">
	function clearall()
	{
	$('#fullname').html('');
	}
	
	function checkPass1(){
//Store the password field objects into variables ...
var pass11 = document.getElementById('pass11');
var pass22 = document.getElementById('pass22');
//Store the Confimation Message Object ...
var message = document.getElementById('confirmMessage');
//Set the colors we will be using ...
var goodColor = "#66cc66";
var badColor = "#ff6666";
//Compare the values in the password field 
//and the confirmation field
if(pass11.value == pass22.value){
	//The passwords match. 
	//Set the color to the good color and inform
	//the user that they have entered the correct password 
	pass22.style.backgroundColor = goodColor;
	message.style.color = goodColor;
	message.innerHTML = "Passwords correct!"
}else{
	//The passwords do not match.
	//Set the color to the bad color and
	//notify the user.									
	pass22.style.backgroundColor = badColor;
	message.style.color = badColor;
	message.innerHTML = "Passwords wrong!"
}
}  
	
	
	</script>
	


	
	
					</body>
					</html>
					

				
					<?php } ?>		

					