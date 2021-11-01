<?php
require('dbconfig.php');

$mid=(int)$_POST['mid'];
$msg=$_POST['msg'];

if ($mid >0) {
	$sql = "insert into response (mid, msg) values (?, ?)";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "is", $mid, $msg); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
	header("Location: 3.viewPost.php?id=$mid");
} else {
	echo "empty title, cannot insert.";
}
?>