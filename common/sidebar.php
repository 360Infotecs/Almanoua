<div id='sidebar-menu' class='main_menu_side hidden-print main_menu'>
<?php	

	
	
	if($_SESSION['Designation']=="Admin")
			{
			echo"
			
              <div class='menu_section'>
                <h3>Admin</h3>
                <ul class='nav side-menu'>
                  <li><a><i class='fa fa-home'></i>User Management<span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                     
                      <li><a href='user_manage.php'>Create User</a></li>
					   
                     
                    </ul>
                  </li>
				  
                <h3>Shop</h3>
                  
				  
                  </li>
				  <li><a href='invoice.php' ><i class='fa fa-file-text'></i> Invoice </a>
				  
                  </li>
                  <li><a href='customerreg.php'><i class='fa fa-user'></i> Customer Registration </span></a>
                  <li><a><i class='fa fa-bar-chart-o'></i>Daily Reports<span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='salesrange.php'>Monthly Report</a> </li>
					  <li><a href='DayReport.php'>Day Sales Report</a> </li>
                     
                    </ul>
                  </li>
				  
				  
                  
                </ul>
              </div>
			   <div class='menu_section'>
			   <h3>Products</h3>
			   <ul class='nav side-menu'>
			   <li><a><i class='fa fa-table'></i> Inventory <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='additem.php'>Add New </a></li>
					   <li><a href='productsearcht.php'>Product Search</a></li>
                      
					  
					
                      
                    </ul>
                  </li>
				  
				  </ul>
			   
			   </div>
			";
			}
			else if($_SESSION['Designation']=="User"){
						echo"
						
						<div class='menu_section'>
                
				  
                <h3>Shop</h3>
                  <ul class='nav side-menu'>
				  <li><a href='productsearcht.php'><i class='fa fa-desktop'></i> Search Item<span class='label label-success pull-right'>Detail</span></a>
                  </li>
				  <li><a href='invoice.php' ><i class='fa fa-file-text'></i> Invoice </a>
				  
                  </li>
                  
                  <li><a><i class='fa fa-bar-chart-o'></i> Reports <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='reports.php'>Sales Report</a> </li>
					  <li><a href='DayReport.php'>Sales Invoice</a> </li>
                     
                    </ul>
                  </li>
                  
                </ul>
              </div>
			  <div class='menu_section'>
			   <h3>WareHouse</h3>
			   <ul class='nav side-menu'>
			   <li><a><i class='fa fa-table'></i> Inventory <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='additem.php'>Add New Item</a></li>
                      
					  
					
                      
                    </ul>
                  </li>
				  
				</ul>
			   
			   </div>
			   
					
						
						";
			}
			else if($_SESSION['Designation']=="Warehouse"){
			echo"<div class='menu_section'>
			   <h3>WareHouse</h3>
			   <ul class='nav side-menu'>
			   <li><a><i class='fa fa-table'></i> Inventory <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='additem.php'>Add New Item</a></li>
                      <li><a href='#'>BinCards</a></li>
					  
					
                      
                    </ul>
                  </li>
				  <li><a href='#'><i class='fa fa-file-text'></i>Delivery Orders</a>
                  </li>
				  <li><a><i class='fa fa-table'></i> Supplier Management <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='unloading.php'>Unloading</a></li>
                      <li><a href='supplier_reg.php'>Supplier Registrations</a></li>
					  
					  
                      
                    </ul>
                  </li>
				  </ul>
			   
			   </div>";};
			?>

            	</div>