<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>insert new message</p>
<hr />
<?php
require('dbconfig.php');

$title=$_POST['title'];
$msg=$_POST['msg'];
$name=$_POST['myname'];

if ($title) {
	$sql = "insert into guestbook (title, msg, name) values (?, ?, ?)";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "sss", $title, $msg,$name); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "message added.";
} else {
	echo "empty title, cannot insert.";
}
?>
<hr>
<a href="1.listUI.php">Home</a>

</body>
</html>
