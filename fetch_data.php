<?php
include("common/DBCon.php");

/*####################Studio price List #######################*/
if(isset($_POST['get_option']))
{
 $ECatagory = $_POST['get_option'];
 $find=mysqli_query($con, "select SellingPrice from bincard where ItemCode='$ECatagory'");
 while ($row = $find->fetch_assoc())
 {
  echo "".$row['SellingPrice']."";
 }
 exit;
}

Global $con;
if(isset($_POST['get_option2']))
{
 $ECatagory2 = $_POST['get_option2'];
 $find2=mysqli_query($con, "select DiscountPrice from bincard where ItemCode='$ECatagory2'");
 while ($row = $find2->fetch_assoc())
 {
  
  echo "<option value=".$row['DiscountPrice'].">".$row['DiscountPrice']."</option>";
 }
 exit;
}

Global $con;
if(isset($_POST['get_option3']))
{
 $ECatagory3 = $_POST['get_option3'];
 $find3=mysqli_query($con, "select QtyBalance from bincard where ItemCode='$ECatagory3'");
 while ($row = $find3->fetch_assoc())
 {
  
  echo "<option value=".$row['QtyBalance'].">".$row['QtyBalance']."</option>";
 }
 exit;
}

Global $con;
if(isset($_POST['get_option4']))
{
 $ECatagory4 = $_POST['get_option4'];
 $find4=mysqli_query($con, "select BinId from bincard where ItemCode ='$ECatagory4'");
 while ($row = $find4->fetch_assoc())
 {
  
  echo "<option value=".$row['BinId'].">".$row['BinId']."</option>";
 }
 exit;
}

if(isset($_POST['get_option5']))
{
 $ECatagory5 = $_POST['get_option5'];
 $find5=mysqli_query($con, "select ItemName from bincard where ItemCode ='$ECatagory5'");
 while ($row = $find5->fetch_assoc())
 {

  echo "".$row['ItemName']."";//"<option value=".$row['ItemName'].">".$row['ItemName']."</option>";
 }
 exit;
}


?>