<?php
	session_start();
	include("common/DBCon.php");
	include("common/sidebar_pro_pic.php");
	if(!isset($_SESSION['user_name'])){
		header("location: login.php");
	}
	else
	{
		
if(isset($_GET['edit_user'])){

$get_id = $_GET['edit_user']; 

$get_pro = "select * from user where Id='$get_id'";

$run_pro = mysqli_query($con, $get_pro); 


$row_pro = mysqli_fetch_array($run_pro);

$user_id = $row_pro['Id'];
$fullname = $row_pro['FullName'];
$designation = $row_pro['Designation'];
$username = $row_pro['UserName'];
$password = $row_pro['PassWord'];
$user_img = $row_pro['User_Pic'];	

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
			
			<title>Al Manoua Invoice System</title>
			
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
									<h3>User Management </h3>
								</div>
								
								
							</div>
							
							<div class="clearfix"></div>
							
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											<h2>Edit User Informations</h2>
											
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<form class="form-horizontal form-label-left input_mask"  method="post" action="" enctype="multipart/form-data">
												
												
												
														<div class="form-group">
														
														<?php 
														$errors = array();
														include('errors.php'); ?>
							    <style>
							.error {
									width: 50%; 
									margin: 0px 0 10px; 
									padding: 10px; 
									border: 1px solid #a94442; 
									color: #a94442; 
									background: #f2dede; 
									border-radius: 5px; 
									text-align: left;						
								}
																																								
								</style>
														
														
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Full Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" id="name_txt_box" class="form-control" value="<?php echo $fullname; ?>" name="fullname" requireddata-inputmask="'mask': '99/99/9999'" >
                          
                        </div>
                      </div>	
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="name_txt_box" class="form-control" value="<?php echo $designation; ?>" name="designation" placeholder="" >
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="name_txt_box" class="form-control" value="<?php echo $username; ?>" name="username" placeholder="" >
                        </div>
					  </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="password" id="pass11"  class="form-control" name="password" value="<?php echo $password; ?>" placeholder="" required>
                        </div>
                      </div>
					 	
												<div class="form-group">
												  <label for="" class="col-sm-2 control-label"> Upload Image</label>
													<div class="col-sm-10">
													  <input type="file" id="name_txt_box" name="user_img" />
													  <img src="images/users/<?php echo $user_img;?>" width= "100" height="100"/>
													</div>
												</div>
																				  
																<div class="ln_solid"></div>
																
																<div class="form-group">
																	<div class="pull-right">
																		
															
																		<button type="submit" name="update_user" class="btn btn-success" >Update</button>
																		
																	</div>
																	
																</div>
															</div>
															
														</form>
													</div>
												</div>
												
																		<?php

if(isset($_POST['update_user'])){
		
$update_id = $user_id;
$fullname = $_POST['fullname'];
$designation = $_POST['designation'];
$username = $_POST['username'];

	$location="images/users/";
    $name=$_FILES['user_img']['name'];
    $temp_name=$_FILES['user_img']['tmp_name'];
   if(empty($name))
	{
		$name = $user_img;
	}
	else
	{
        move_uploaded_file($temp_name,$location.$name);
    }
		
	$update_product = "update user set FullName='$fullname',Designation='$designation',UserName='$username',User_Pic='$name' where Id='$update_id'";
	
	$run_product = mysqli_query($con, $update_product);
	
	if ($run_product){
		echo"<script>alert('Update Successfully !!')</script>";
		echo "<script>window.open('user_manage.php','_self') </script>";
	}
		
}


?>

												
			<div class="row">
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Details</h2>
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
                          <th><center>Full Name</center></th>
                          <th><center>Role</center></th>
						  <th><center>Profile Picture</center></th>
                          <th><center>Username</center></th>
                          <th><center>Edit Details</center></th>
						  <th><center>Delete User Account</center></th>
                        </tr>
                      </thead>


                      <tbody>
					  
														<?php			
														$get_user = "select * from user";				
														$result = mysqli_query($con,$get_user);
														
														$i=0;
														
														while($row = mysqli_fetch_array($result))
														{
															$user_id = $row['Id'];
															$fullname = $row['FullName'];
															$designation = $row['Designation'];
															$username = $row['UserName'];
															$password = $row['PassWord'];
															$user_img = $row['User_Pic'];	
															$i++;
														
														?>
															<tr>
															  <td style='padding:40px;'><center><?php echo $fullname; ?></center></td>
															  <td style='padding:40px;'> <center><?php echo $designation; ?></center></td>
															  <td><center><img src="images/users/<?php echo $user_img;?>" width= "100" height="100"/></center></td>
															  <td style='padding:40px;'><center><?php echo $username; ?></center></td>
															  <td style='padding:40px;'><center><a href = "edit_user.php?edit_user=<?php echo $user_id; ?>" class="btn btn-primary"/>Edit</a></center></td>													  
															<td style='padding:40px;'><center><a href = "delete_user.php?delete_user=<?php echo $user_id; ?>" class="btn btn-danger"/>Delete</a></center></td>													  
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

					