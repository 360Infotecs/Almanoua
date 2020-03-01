<?php
	session_start();
	date_default_timezone_set('Asia/Colombo');
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
			
			<title>Al Manoua Invoice System</title>
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
		<style>
		
		textarea {
   resize: none;
				}
</style>
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
									<h3>Customer Invoice <small>
										<i class="ace-icon fa fa-angle-double-right"></i>
										<!-- Get Last  Order Id -->
										<span style='color:red; font-size: 2em;'>
											<?php
												$sql1="select InvoId from invoiceorder order by InvoId DESC LIMIT 0,1 ";
												$result = $con->query($sql1);
												
												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) {
														$id =$row["InvoId"];
														$x = ($row["InvoId"])+1;
														$_SESSION["soid"]= $x;
														echo $_SESSION["soid"];
														
														$sql2="insert into invoiceorder (InvoId) value('$x')";
														$query = mysqli_query($con, $sql2);
														
														
														
														
														
													}
												}
												
											?>
										</span>
										
									</small></h3>
									
								</div>
								
								
							</div>
							
							<div class="clearfix"></div>
							
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div align="center">
											<!--<h2>Customer Invoice</h2>-->
											<p><h5><address><h2><img style='height:120px; width:200px;' src='images/invoice.png'></h2><br>
												<div class="clearfix"></div>
												
												All kinds of Uniforms & Embroidery Specially Cap - T - Shirt (Logo) <br>
												Kingdom of Saudi Arabia Riyadh - Al Oud Area
												<div class="clearfix"></div>
											</div>
											<div class="x_content">
												<form class="form-horizontal form-label-left input_mask" action="invoice.php" method="post" enctype="multipart/form-data">
													
													
													<input type="hidden" name="id" id="id" value="<?php echo $x; ?>"/>
													<br>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" class="form-control has-feedback-left" id="date" name="date" value="<?php echo date('Y-m-d H:i:s');?>" placeholder="Date">
														<span class="fa fa-date form-control-feedback left" aria-hidden="true"></span>
														
													</div>
													
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" readonly class="form-control has-feedback-left" id="SalesPerson" name="SalesPerson" value="<?php echo $_SESSION['user_name'];?>" placeholder="Sales Person">
														<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
														
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" class="form-control has-feedback-left" id="Telephone" name="Telephone" placeholder="Phone Number">
														<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
													</div>
													
													<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
														<input type="text" class="form-control" id="CustomerName" name="CustomerName" placeholder="CustomerName">
														<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
													</div>
													
														<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Item Code</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<select class="form-control select2" name="item_code" class="form-control" id="item_code" >
																<option selected="selected">Select a Category</option>
																<?php
																	$select = mysqli_query($con, "select ItemCode from bincard group by ItemCode");
																	while ($row = $select->fetch_assoc()){
																		echo "
																		<option value=".$row['ItemCode'].">".$row['ItemCode']."</option>";
																	}
																?>
																
																<script type="text/javascript">
																	
																	$(function(){
																		
																		$("#item_code").change(function(){ 
																			
																			fetch_select($(this).val());
																		});
																	});
																</script>
															
															</select>
														</div>
													</div>
													
													
													
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Item Name</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
														
												
														<input readonly  type="text" class="form-control" id="your" name="item_name" style="width: 100%;">
												
														</div>
													</div>
													
													
													
													
													<style>  
														.list-unstyled
														{  
														background-color:#eee;  
														cursor:pointer;  
														font-size:15px;
														color:#3D3E40;
														font-family:Segoe UI;
														font-type:bold;
														padding:5px 5px 5px 5px;
														}  
														.list_li{  
														padding:7px;  
														}  
													</style>  
													
													
													<script>
														/*$(document).ready(function()
															{
															$('#ItemDesc').keyup(function()
															{
															var queryList = $(this).val();
															if(queryList != '')
															{
															$.ajax({
															url:"search_item.php",
															method:"POST",
															data:{queryList:queryList},
															success:function(data)
															{
															$('#com_name_list').fadeIn();
															$('#com_name_list').html(data);
															}	
															});
															}
															});
															
															$(document).on('click', 'li', function(){  
															$('#ItemDesc').val($(this).text());  
															$('#com_name_list').fadeOut();  
															});  
														});	*/
													</script>
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Price</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															
															<input type="text" style="resize: none; padding:0 0 0 15px;" class="form-control select2" class="form-control" id="UnitPrice" name="UnitPrice">
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Discount Price</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<select readonly class="form-control select2" id="Dis_Price" name="Dis_Price" style="width: 100%;"></select>
															<!-- <textarea readonly rows="1" cols="1" style="resize: none; " class="form-control" id="Dis_Price" name="Dis_Price"></textarea> -->
														</div>
													</div>
													
													
													
													
													
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<input type="text" class="form-control"  id="Quantity" name="Quantity" placeholder="Quantity">
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Available Quantity</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<select readonly class="form-control select2" id="av_quantity" name="av_quantity" style="width: 100%;"></select>
														</div>
													</div>
													<div class="form-group">
														
														<div class="col-md-9 col-sm-9 col-xs-12">
															<select  style="visibility: hidden" readonly class="form-control select2" id="binid" name="binid" style="width: 100%;"></select>
														</div>
													</div>
													
													<div class="col-md-3 col-sm-3 col-xs-6 pull-right">
														<button type="button" class="btn btn-block btn-warning btn-sm" style="font-size:14px;" value="click" onclick="addRow1('TableA'); sum(); sql();" name="btnPFAdd">Add</button>
													</div>
													<div class="clearfix"></div>
													<br>
													<!--Item Add button-->
													
													
													<div class="x_title">
														<h2>Bill</h2>
														
														<div class="clearfix"></div>
													</div>
													
													
													<div class="form-group">
														
														
														<div class="vspace-8-sm"></div>
														
														<div class="col-sm-12">
															
															<script src="js/jquery.min.js"></script>
															
															<button id="delete-button" style="margin:0 0 5px;" class="btn btn-danger btn-sm">Delete</button>
															
															<script>
																$("#delete-button").on("click", function(e) {
																	$("#TableA tr:has(td > input[type=checkbox]:checked)").remove();
																	sum();
																	sql();
																});
															</script>
															
															<table class="table table-striped table-bordered table-hover" id="TableA" cellpadding="pixels">
																<thead class="thin-border-bottom">
																	<tr>
																		<th>ID</th>
																		<th>Item Name</th>
																		<th>Unit Price</th>
																		<th>Quantity</th><!--class="hidden-480"-->
																		<th>Sub Total</th>
																		<th>Del</th>
																	</tr>
																</thead>
																<tbody>
																</tbody>
																<tfoot>
																	<tr>
																		<th colspan="4">Grand Total</th>
																		<th><label id="sotocharge" name="sotocharge" style="color:red;" onclick="bal();"></label></th>
																		<th></th>
																	</tr>
																</tfoot>
															</table>
															<div id="hdn1"></div>
															<input type="hidden" id="hdn" name="hdn"/>
															<script type="text/javascript">
																
																
																<!-- Ajax Script for fatch data -->
																
																
																
																function addRow1(tableID)
																{
																	var xx = document.getElementById("your").value;
																	var yy = document.getElementById("UnitPrice").value;
																	var zz = document.getElementById("Quantity").value;
																	var aa = document.getElementById("binid").value;
																	var tot = yy * zz;
																	// Get a reference to the table
																	var tableRef = document.getElementById(tableID).getElementsByTagName("tbody")[0];
																	var x;
																	// Insert a row in the table at row index 0
																	var newRow = tableRef.insertRow(x);
																	
																	// Insert a cell in the row at index 0
																	var newCell1 = newRow.insertCell(0);
																	var newCell2 = newRow.insertCell(1);
																	var newCell3 = newRow.insertCell(2);
																	var newCell4 = newRow.insertCell(3);
																	var newCell5 = newRow.insertCell(4);
																	var newCell6 = newRow.insertCell(5);
																	
																	// Append a text node to the cell
																	var newText1 = document.createTextNode(aa);
																	var newText2 = document.createTextNode(xx);
																	var newText3 = document.createTextNode(yy);
																	var newText4 = document.createTextNode(zz);
																	var newText5 = document.createTextNode(tot);
																	
																	//fourth create checkbox in that td element
																	var chkbox = document.createElement('input');
																	chkbox.type = "checkbox";
																	//chkbox.id = "chk" ;
																	//chkbox.name = "chk" ;
																	newCell1.appendChild(newText1);
																	newCell2.appendChild(newText2);
																	newCell3.appendChild(newText3);
																	newCell4.appendChild(newText4);
																	newCell5.appendChild(newText5);
																	//Fifth add checkbox to td element
																	newCell6.appendChild(chkbox);
																	//Row Increment
																	x=x+1;
																}
															</script>
														</div><!-- /.col -->
													</div>
												</div>	
												<div class="col-sm-6">
													<div class="form-group">
														<label for="inputPassword3" class="col-sm-3 control-label">Current Payment</label>
														<div class="col-sm-6">
															<input type="text" class="form-control" id="socupay" name="socupay" placeholder="Price" onblur="sum(); sql();" required>
														</div>
													</div>
													<br /><br />
													<div class="form-group">
														<label for="inputPassword3" class="col-sm-3 control-label">Balance</label>
														<div class="col-sm-6">
															<input type="text" class="form-control" id="sobalance" name="sobalance" placeholder="Price" required>
															<input type="hidden" id="demo" name="demo" />
															<input type="hidden" id="upd" name="upd" />
															<input type="hidden" id="bill" name="bill" />
															
														</div>												
													</div>
												</div>	
												<div class="ln_solid"></div>
												
												<div class="form-group">
													<div class="pull-right">
														
														<button type="submit" name="btnSubmit" class="btn btn-success"><i class="fa fa-print"></i>Order Now</button>
														<!--<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>-->
													</div>
													
												</div>
											</div>
											
											
											</form>
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
				<script type="text/javascript">
					function sql() 
					{
						var xx = document.getElementById("id").value;
						var combo="INSERT INTO `invoiceorderitem`(`InvoId`,`Item_Id`,`ItemDescription`,`UnitPrice`,`Quantity`,`SubTotal`,`Total`) VALUES ";
						var vall =combo;
						var rows = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
						
						var upqrys="UPDATE `bincard` SET `QtyBalance` = CASE `BinId` ";
						var upqrye="ELSE `QtyBalance` END";
						var upqrym ="";
						for(var x=0; x<rows; x++)
						{
							var val = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[0].innerHTML;
							var val1 = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[1].innerHTML;
							var val2 = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[2].innerHTML;
							var val3 = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[3].innerHTML;
							var val4 = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[4].innerHTML;
							
							var val5 = document.getElementById("sotocharge").innerHTML;
							if(x+1 < rows){	combo+= "("+ xx+ ","+ val + ",'"+ val1 +"',"+ val2 +","+ val3 +","+ val4 +","+ val5 +"),";}
							else{combo+= "("+ xx+ ","+ val + ",'"+ val1 +"',"+ val2 +","+ val3 +","+ val4 +","+ val5 +")";}
							
							upqrym = upqrym + "WHEN "+val+" THEN `QtyBalance`-"+val3+" ";
							
						}
						
						document.getElementById("demo").value = combo;
						document.getElementById("upd").value = upqrys + upqrym + upqrye;
						//alert(document.getElementById("demo").value);
					}
				</script>
				

				
				
				<script type="text/javascript">
					function sum() 
					{
						//Sum Calculation
						var sum = 0;
						var rows = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
						for(var x=0; x<rows; x++)
						{
							var val = document.getElementById("TableA").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[x].getElementsByTagName("td")[4].innerHTML;
							sum+=parseFloat(val);
						}
						document.getElementById("sotocharge").innerHTML=sum;		
						
						//Balance Calculation
						var tot = document.getElementById('sotocharge').innerHTML;
						document.getElementById("bill").value = tot;
						var pay = document.getElementById('socupay').value;
						if((document.getElementById('socupay').value) != '')
						{	var bal = parseFloat(pay) - parseFloat(tot);
						document.getElementById('sobalance').value=bal;}
						else{document.getElementById('sobalance').value="0";}
					}
				</script>					
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
				
				
				<script type="text/javascript">
					
					/*Studio price List*/
					function fetch_select(val)
					{
						$.ajax({
							type: 'post',
							url: 'fetch_data.php',
							data: {
								get_option:val
							},
							success: function (response) {
								$("#UnitPrice").val(response);
							}
						});
						
						$.ajax({
							type: 'post',
							url: 'fetch_data.php',
							data: {
								get_option2:val
							},
							success: function (response) {
								
								document.getElementById("Dis_Price").innerHTML=response;
							}
						});
						
						$.ajax({
							type: 'post',
							url: 'fetch_data.php',
							data: {
								get_option3:val
							},
							success: function (response) {
								
								document.getElementById("av_quantity").innerHTML=response;
							}
						});
						
						$.ajax({
							type: 'post',
							url: 'fetch_data.php',
							data: {
								get_option4:val
							},
							success: function (response) {
								
								document.getElementById("binid").innerHTML=response;
							}
						});
						
						$.ajax({
							type: 'post',
							url: 'fetch_data.php',
							data: {
								get_option5:val
							},
							success: function (response) {
								
								//document.getElementById("your").innerHTML=response;
								$("#your").val(response);
							}
						});
						
					}
					
					
					
				</script>
				
			</body>
		</html>
		<?php
			global $con;
			
			if (isset($_POST['btnSubmit']))
			{
				$id = $_POST['id'];
				$date = $_POST['date'];
				$SalesPerson = $_POST['SalesPerson'];
				$Telephone = $_POST['Telephone'];
				$CustomerName = $_POST['CustomerName'];
				
				$billvalue = $_POST['bill'];
				$socupay = $_POST['socupay'];
				$sobalance = $_POST['sobalance'];
				$itemList = $_POST['demo'];
				$updqry = $_POST['upd'];
				$namet=$_POST['item_name'];
				$Quantity = $_POST['Quantity'];
				$i=0;
				$j=1;
				
				
				
				
				
				if( $socupay == NULL && $itemList == NULL)
				{
					echo"<script> alert('Please fill all the fields')</script>";
				}
				else
				{			
					//$sql = "insert into invoiceorder (InvoId,Date,SalesPerson,Telephone,Customer,CurrentPayment,Balance,BillValue) 
					//values ('$id','$date','$SalesPerson','$Telephone','$CustomerName','$socupay','$sobalance','$billvalue')";
					
					$sql = "UPDATE invoiceorder SET Date='$date',SalesPerson='$SalesPerson',Telephone='$Telephone',Customer='$CustomerName',CurrentPayment='$socupay',Balance='$sobalance',BillValue='$billvalue' WHERE InvoId = $id";
					
						
						$sql1 = $itemList;
						
						$query = mysqli_query($con, $sql);
						
						$query1 = mysqli_query($con, $sql1);
						
						$query2 = mysqli_query($con, $updqry);
						
						
						
						if($query && $query1 && $query2)
						{
							echo "<script>alert('Your Order is Complete!')</script>";
							echo "<script>window.open('invoiceprint3.php?id=$id',target ='_blank')</script>";
							//echo "<a target='_blank' href=invoiceprint3.php?id=$id></a>";
						}	
						else
						{
							echo "Error: " . $sql . "<br>" . $con->error;
						}
				}
				
				}
				
			
		?>
	<?php } ?>																