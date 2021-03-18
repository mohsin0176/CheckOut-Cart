<?php

session_start();
include "connect.php";
include "item.php";


mysqli_query($con,"INSERT INTO orders (name,datecreation,status,username)
VALUES ("New Order","'.date('Y-m-d').'",0,"acc2")");
$ordersid=mysql_insert_id($con);

$cart=unserialize(serialize($_SESSION['cart']));
for($i=0;$i<count($cart);$i++)
{
   mysqli_query($con,"INSERT INTO ordersdetail(productid,ordersid,price,quantity) VALUES('.$cart[$i]->id.','.$ordersid.','.$cart[$i]->price.') ");
}

unset($_SESSION['cart']);


?>

Thanks For Buying Product.Click <a href="index.php">Here</a> To Continue Buy Product