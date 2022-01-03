<?php
session_start();
require("dbconnect.php");
$userName = $_POST['id'];
$passWord = $_POST['pwd'];

$userName = mysqli_real_escape_string($conn,$userName);

$sql = "SELECT password, id FROM user WHERE loginID='$userName'";
if ($result = mysqli_query($conn,$sql)) {
	if ($row=mysqli_fetch_assoc($result)) {
		if ($row['password'] == $passWord) {
			//keep the user ID in session as a mark of login
			$_SESSION['uID'] = $row['id'];
			//provide a link to the message list UI
			echo "<a href='listMessage.php'>go</a>";
		} else {
			//print error message
			echo "Invalid Username or Password - Please try again <br />";
		}
	}
}
?>
