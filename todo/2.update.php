<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>update message</p>
<hr />
<?php
require("dbconfig.php");
if(isset($_POST['id'])) {
	$id=(int)$_POST['id'];
} else {
	$id=0;
}


if ($id>0) {
	$title=$_POST['title'];
	$msg=$_POST['msg'];
	$name=$_POST['myname'];

	$sql = "update guestbook set title=?, msg=?, name=? where id=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "sssi", $title, $msg,$name, $id);
	mysqli_stmt_execute($stmt); //執行SQL
	echo "message updated";
} else echo "empty message id.";
?>
<hr>
<a href="1.listUI.php">Home</a>

</body>
</html>
