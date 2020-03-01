<?php
	session_start();
include("common/DBCon.php");
include("functions.php");
date_default_timezone_set('Asia/Colombo');
	include("common/sidebar_pro_pic.php");
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

    <title>BlackHills | Management System </title>

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
             <a href="index.html" class="site_title"><img  class='' style='height:61px; width:42px;' src='images/logo.png'> <span>BlackHills</span></a>
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
                <h3>Sales</h3>
              </div>

              <div class="title_right">
                <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Today Sales <?php echo date('Y-m-d H:i:s');?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <p>Search Sales Rangers</p>
					
					<form class="form-search" method="get" action="salesrangeresult.php" enctype="multipart/form-data">
														<div class="row">
															<div class="col-xs-8 col-sm-6">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-check"></i>
																	</span>

																	<input type="date" name="startdate" class="form-control search-query" placeholder="Start Date" />
																	
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>TO</b> 
																	<input type="date" name="enddate" class="form-control search-query" placeholder="End Date" />
																	
																	<span class="input-group-btn">
																		<button type="submit" name="search" value="search" class="btn btn-success">
																			
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
                            <th class="column-title">Invoice No </th>
                            <th class="column-title">Invoice Date </th>
                           
                            <th class="column-title">Bill to Name </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Amount </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            
                          </tr>
                        </thead>
						<?php
					include("Common/DBCon.php");
					//global $con;
					$todaysDate = date("Y-m-d");
					///$stuid = $_GET['id'];WHERE Date = CURDATE()
					$sales = 0;
					$stu_query = "SELECT * FROM invoiceorder where Date like '%$todaysDate%'";
					
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
												<td>$InvoId  <i class='success fa fa-long-arrow-up'></i></td>
												<td>$Date</td>
											   
												<td>$Customer</td>
												<td>Paid</td>
												<td class='a-right a-right '>Rs.$BillValue</td>
												<td class='last'><a class='btn btn-xs btn-warning' href='invoicepreview3.php?id=".$sorows['InvoId']."''><button class='btn btn-xs btn-warning'>
															 View
																<i class='ace-icon fa fa-flag bigger-120'></i>
															</button></a>
												</td>
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
  </body>
</html>
<?php } ?>