<?php 

	include("common/DBCon.php");

	if(isset($_GET['delete_item'])){

	$delete_sup_id = $_GET['delete_item']; 
	
	$delete_supplier = "delete from bincard where BinId='$delete_sup_id'";
	
	$run_sup_delete = mysqli_query($con, $delete_supplier); 
	
	if($run_sup_delete)
	{
		echo"<script>alert('Supplier has been deleted !!')</script>";
		echo"<script>window.open('additem.php', '_self')</script>";
	}

	}

?>