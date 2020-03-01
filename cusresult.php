<?php
	session_start();
	date_default_timezone_set('Asia/Colombo');
	include("common/DBCon.php");
	include("common/sidebar_pro_pic.php");
	if(!isset($_SESSION['user_name'])){
		header("location:../login.php");
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
			
			<title>DGL |Customer Registrations </title>
			
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
								<a href="index.php" class="site_title"><img  class='' style='height:61px; width:42px;' src='images/logo.png'> <span>DG Laboratory</span></a>
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
									<h3> <span style='color:red; font-size: 2em;'>
											<?php
												$sql1="select id from customer order by id DESC LIMIT 0,1";
												$result = $con->query($sql1);
												
												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) {
														$id =$row["id"];
														$x = ($row["id"])+1;
														$_SESSION["soid"]= $x;
														echo $_SESSION["soid"];
														
														//$sql2="insert into invoiceorder (InvoId) value('$x')";
														//$query = mysqli_query($con, $sql2);
														
														
														
														
														
													}
												}
												
											?>
										</span></h3>
								</div>
								
								
							</div>
							
							<div class="clearfix"></div>
							
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										
										<div class="x_content">
											<form class="form-horizontal form-label-left input_mask"  method="post" enctype="multipart/form-data">
											
											<div class="x_title">
											<h2>Customer Informations</h2>
											<div class="col-md-9 col-sm-9 col-xs-9">
											
															</div>
											<div class="clearfix"></div>
										</div>
							<input type="hidden" readonly class="form-control has-feedback-left" id="id" name="id" value="<?php echo $x;?>" placeholder="user">

											<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="hidden" class="form-control has-feedback-left" id="date" name="date" value="<?php echo date('Y-m-d H:i:s');?>" placeholder="Date">
														
														
													</div>
													
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="hidden" readonly class="form-control has-feedback-left" id="user" name="user" value="<?php echo $_SESSION['user_name'];?>" placeholder="user">
														
														
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" class="form-control has-feedback-left" id="Telephone" name="Telephone" placeholder="Phone Number">
														<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
													</div>
													
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" class="form-control" id="CustomerName" name="CustomerName"  placeholder="CustomerName" required>
														<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" class="form-control has-feedback-left" id="Company" name="Company"  placeholder="Company Name">
														<span class="fa fa-work form-control-feedback left" aria-hidden="true"></span>
														
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" class="form-control has-feedback-left" id="Address"  name="Address" placeholder="Address">
														<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="email" class="form-control has-feedback-left" id="email" name="email"  placeholder="Customer Email">
														<span class="fa fa-email form-control-feedback left" aria-hidden="true"></span>
														
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text"  class="form-control has-feedback-left" id="nic" name="nic"  placeholder="NIC OR Passport">
														<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
														
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" class="form-control has-feedback-left" id="cusref" name="cusref"  placeholder="Customer Code">
														<span class="fa fa-email form-control-feedback left" aria-hidden="true"></span>
														
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<textarea type="text"  class="form-control has-feedback-left" id="remark" name="remark"  placeholder="Customer Remark"></textarea>
														<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
														
													</div>
												
												
												
												
												
													
												
												
												<div class="form-group">
												  <label for="" class="col-sm-2 control-label"> Upload Image</label>
													<div class="col-sm-10">
													  <input type="file" id="img" name="img" />
													<!-- <img src="images/users/<?php //echo $user_img;?>" width= "100" height="100"/>-->
													</div>
												</div>
												
												
												
												
												
												<div class="ln_solid"></div>
												
												<div class="form-group">
												<div class="">
														
														<button type="submit" name="btnsave1"class="btn btn-info">Save Customer Details</button>
														
														
													</div>
													
												</div>
												
											</div>
											
										</form>
										
										
								</div>
							</div>
						</div>
						 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Verifcations Issued</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <p>Search Report</p>
					
					<form class="form-search" method="get" action="cusresult.php" enctype="multipart/form-data">
														<div class="row">
															<div class="col-xs-8 col-sm-6">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-check"></i>
																	</span>

																	<input type="text" name="user_query" class="form-control search-query"  placeholder="Enter Customer Phone Number" />
																	<span class="input-group-btn">
																		<button type="submit" name="search" value="search" class="btn btn-purple btn-sm">
																			
																			Search
																		</button>
																	</span>
																</div>
																</div>
														</div>
													</form>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="TableA">
                        <thead>
                          <tr class="headings">
                           <!-- <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>-->
                            <th class="column-title">Customer No </th>
                            <th class="column-title">Customer Code</th>
                           
                            <th class="column-title">Customer Name</th>
							 <th class="column-title">Company</th>
                            <th class="column-title">Telephone</th>
                            <th class="column-title">NIC </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            
                          </tr>
                        </thead>
						<?php
					//include("common/DBCon.php");
					//global $con;
					//$todaysDate = date('jS \ F Y ');
					///$stuid = $_GET['id'];WHERE Date = CURDATE()
					//$sales = 0;
					global $con;
						$search_query= $_GET['user_query'];
												$sea_pay = mysqli_query($con, "SELECT * FROM customer WHERE CusNo = '$search_query'");
												while ($row = $sea_pay->fetch_assoc()){
													//$id = $soprows['id'];
													$id = $row['id'];
													$cusref = $row['CusRef'];
													$CustomerName = $row['CusName'];
													$Company = $row['ComName'];
													$Telephone= $row['CusNo'];
													$email= $row['CusEmail'];
													$nic= $row['Nic'];
													$Address = $row['Address'];
													$remark = $row['CusRemark'];
													
												
						
					
					
				
								echo "		<tbody>
											  <tr class='even pointer'>
												<!--<td class='a-center'>
												  <input type='checkbox' class='flat' name='table_records'>
												</td>-->
												<td>$id  <i class='success fa fa-long-arrow-up'></i></td>
												<td>$cusref</td>
											   
												<td>$CustomerName</td>
												<td>$Company</td>
												<td>$Telephone</td>
												<td class='a-right a-right '>$nic</td>
												<td class='last'><a class='btn btn-xs btn-warning' href='cusedit.php?id=".$row['id']."''><button class='btn btn-xs btn-warning'>
															 Edit
																<i class='ace-icon fa fa-flag bigger-120'></i>
															</button></a>
												</td>
											  </tr>       
											</tbody>
														
														";
														
														
					}
														
				?>

                        
						
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
if(isset($_POST['btnsave1'])){ 
		//$id = $_POST['id'];
		$cusref = $_POST['cusref'];
		$CustomerName = $_POST['CustomerName'];
		$Company = $_POST['Company'];
		$Telephone= $_POST['Telephone'];
		$email= $_POST['email'];
		$nic= $_POST['nic'];
		$Address = $_POST['Address'];
		$remark = $_POST['remark'];
		$date = $_POST['date'];
		$user = $_POST['user'];
		
		$Image = $_FILES['img']['name'];
	$Image_tmp = $_FILES['img']['tmp_name'];
		
		if($nic =='' or $CustomerName =='' )  
	{
		echo "<script>alert(' Please Fill the Required Fields')</script>";
		exit();
	}
	else
	{
		move_uploaded_file($Image_tmp,"images/users/$Image");    //upload the picture into the image folder
		
		$query = "insert into customer(CusRef,CusNo,CusName,ComName,Address,CusEmail,Nic,CusRemark,UserEntered,DateandTime,image)
VALUES ('$cusref','$Telephone','$CustomerName','$Company','$Address','$email','$nic','$remark','$user','$date','$Image')";
		
		if ($con->query($query) === TRUE) 
		{
			echo"<script>alert('Design insert Successfully')</script>";
			echo"<script>window.open('gemverification.php',target ='_blank')</script>";
		} else 
			
		{
			echo "Error: " . $query . "<br>" . $con->error;
		}

		$con->close();
	}
		
	}
	
	
	
	
?>
<?php } ?>									