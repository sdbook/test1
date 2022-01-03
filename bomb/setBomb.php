<?php 
require "dbconnect.php";
$i=(int)$_REQUEST["id"];
$newD = date("Y-m-d H:i:s",strtotime("+10 seconds"));
$sql="update game set expire ='$newD' where id=$i";
$res=mysqli_query($conn,$sql) or die("db error");
echo $newD;
?>
