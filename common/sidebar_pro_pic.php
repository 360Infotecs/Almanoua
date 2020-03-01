     	   
	   <div class="top_nav">
          
              
              <ul class="nav navbar-nav navbar-right">
                
                  <a href="javascript:;" class="user-profile dropdown-toggle" style="visibility:hidden;">
				  
				  <?php 
				  $user = $_SESSION['user_name'];
				  
				  $get_img = "select * from user where UserName = '$user'";
				  
				  $run_img = mysqli_query($con, $get_img);
				  
				  $row_img = mysqli_fetch_array($run_img);
				  
				  $u_img = $row_img['User_Pic']
				  
				  
				  ?>
				  
              </ul>
            </nav>
          </div>
        </div>