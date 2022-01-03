<?php
session_start();
require("dbconnect.php");
if (! isset($_SESSION["id"]))
	$_SESSION["uID"] = 0;
	
if ($_SESSION["uID"] <= 0) {
	//header("Location: login.php");
	echo "Please Login. <a href='loginForm.php'>Login</a>";
	exit(0);
}
?>
<h1>Guest Book</h1><hr />
<a href="listMessage.php">List Message</a> 
<a href="addMessageForm.php">Add Message</a> 
<a href="deleteMessageForm.php">Delete Message</a> 
