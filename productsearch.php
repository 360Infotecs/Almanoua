<?php
	session_start();
	include("common/DBCon.php");
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
    
    <!-- Custom styling plus plugins -->
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
                <h3> Products View</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Search an Item</h2>
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
				  <!--Searching tool Bar comes here-->
				  <form class="form-search">
										<div class="col-sm-9"  >
											<div class="input-group" >
												<input type="text" class="form-control" name="user_query" placeholder=" Enter Product Code">
												<span class="input-group-btn">
													<button type="submit" name="search" class="btn btn-primary">Search!</button>
												</span>
											</div>
										</div>
										</form>
										
										<!--Searching tool Bar comes here-->
										<br>
										

                    <div class="row">
					<?php
					include ("Common/DBCon.php");
														if (isset($_GET['search'])){
												
											$search_query= $_GET['user_query'];
												
												
											
											$result = mysqli_query($con,"SELECT * FROM  bincard where ItemCode like '%$search_query%'");
														
														while($row = mysqli_fetch_array($result))
														{
															$BinId = $row['BinId'];
															$DateRecieved = $row['DateRecieved'];
															$ItemName = $row['ItemName'];
															$ItemCode = $row['ItemCode'];
															$ItemSize = $row['ItemSize'];
															$QtyRecieved = $row['QtyRecieved'];
															$QtyIssued = $row['QtyIssued'];
															$QtyRetured = $row['QtyRetured'];
															$QtyBalance = $row['QtyBalance'];
															$DeliveryOrderNo = $row['DeliveryOrderNo'];
															$CheckedBy = $row['CheckedBy'];
															$StockPrice = $row['StockPrice'];
															$DiscountPrice = $row['DiscountPrice'];
															$SellingPrice = $row['SellingPrice'];
															$image = $row['image'];
															
															
														echo "
																<div class='col-md-6 col-sm-6 col-xs-12 profile_details' >
																<div class='well profile_view' >
																  <div class='col-sm-12' >
																	<h4 class='brief'><i>Item ID : $BinId</i></h4>
																	<div class='left col-xs-7'>
																	  <h2>$ItemName</h2>
																	  <p><strong> Item Code : $ItemCode</strong>Item Size : $ItemSize</p>
																	  <ul class='list-unstyled'>
																		<li><i class='fa fa-building'></i> Balance Available: $QtyBalance</li>
																		<li><i class='fa fa-phone'></i> Selling Price : $SellingPrice</li>
																		<li><i class='fa fa-phone'></i> Discounted Price : $DiscountPrice </li>
																		
																	  </ul>
																	</div>
																	<div class='right col-xs-5 text-center'>
																	  <img src='images/items/$image ' alt='' class='img-circle img-responsive'>
																	</div>
																  </div>
																  <div class='col-xs-12 bottom text-center'>
																	
																	<div class='col-xs-12 col-sm-6 emphasis'>
																	  <button type='button' class='btn btn-success btn-xs'> <i class='fa fa-user'>
																		</i> <i class='fa fa-comments-o'></i> </button>
																		<a href='productsearch.php?add_cart= $BinId'>
																	  <button type='button' class='btn btn-primary btn-xs'>
																		<i class='fa fa-user'> </i> Add to Cart
																	  </button></a>
																	</div>
																  </div>
																</div>
															  </div>";
															}
															
															
															

														}
														
															?>
					
					<?php
					
					
						
						?>
                       
                      
                      
                      
                      
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