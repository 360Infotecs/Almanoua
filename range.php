<?php
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
	$con = mysqli_connect("localhost","root","","blackhills");
	$result = '';
	$query = "SELECT * FROM invoiceorder WHERE Date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($con, $query);
	$result .='
	<table class="table table-bordered">
	<tr>
	<th width="3%">Invoice Id</th>
	<th width="10%">Date</th>
	<th width="10%">Sales Person</th>
	<th width="10%">Customer</th>
	<th width="8%">Amount</th>
	</tr>';
	if(mysqli_num_rows($sql) > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
			<tr>
			<td>'.$row["InvoId"].'</td>
			<td>'.$row["Date"].'</td>
			<td>'.$row["SalesPerson"].'</td>
			<td>'.$row["Customer"].'</td>
			<td> Rs '.$row["BillValue"].'</td>
			</tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Purchased Item Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}
?>