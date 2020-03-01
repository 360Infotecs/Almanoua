   	   
	   <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				  
				  <?php 
				  $user = $_SESSION['user_name'];
				  
				  $get_img = "select * from user where UserName = '$user'";
				  
				  $run_img = mysqli_query($con, $get_img);
				  
				  $row_img = mysqli_fetch_array($run_img);
				  
				  $u_img = $row_img['User_Pic']
				  
				  
				  ?>
				  
				  
				  
                    <?php echo "<img src='images/users/$u_img'/>"; ?> <?php echo $_SESSION['user_name'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-spinner">Cart</i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                       
                        <span>
                          <span>Total Items :</span>
                          
                        </span>
                        
                      </a>
                    </li>
					<li>
                      <a>
                       
                        <span>
                          <span>Total Amount : Rs.</span>
                          
                        </span>
                        
                      </a>
                    </li>
                    
                   
                    
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Bill The Products</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>-->
              </ul>
            </nav>
          </div>
        </div>