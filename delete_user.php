<?php 

	include("common/DBCon.php");

	if(isset($_GET['delete_user'])){

	$delete_id = $_GET['delete_user']; 
	
	$delete_user = "delete from user where Id='$delete_id'";
	
	$run_delete = mysqli_query($con, $delete_user); 
	
	if($run_delete)
	{
		echo"<script>alert('User has been deleted !!')</script>";
		echo"<script>window.open('user_manage.php', '_self')</script>";
	}

	}

?>