<?php
require("dbconnect.php");
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$name=mysqli_real_escape_string($conn,$_POST['myname']);

if ($title) { //if title is not empty
	$sql = "insert into guestbook (title, msg, name) values ('$title', '$msg','$name');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	echo "Message added";
} else {
	echo "Message title cannot be empty";
}

?>