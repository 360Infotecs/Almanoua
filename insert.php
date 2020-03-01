<?php
//insert.php;

if(isset($_POST["item_date"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=blackhills", "root", "");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["item_date"]); $count++)
 {  
  $query = "INSERT INTO unloading 
  (Date, CompanyName, InvoiceNo, VehicleNo, ItemSize, Quantity) 
  VALUES (:item_date, :item_com_name,:item_invoice,:item_vehicle,:item_size, :item_quantity)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(

    ':item_date'  => $_POST["item_date"][$count], 
    ':item_com_name' => $_POST["item_com_name"][$count], 
	':item_invoice'  => $_POST["item_invoice"][$count], 
    ':item_vehicle' => $_POST["item_vehicle"][$count], 
	':item_size'  => $_POST["item_size"][$count], 
    ':item_quantity' => $_POST["item_quantity"][$count], 

   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>