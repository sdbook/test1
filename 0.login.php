<?php
require("dbconfig.php");
	 //�ҥ�session �\��, �����bphp�{���٨S��X����T�����e�ҥ�
	$loginID = $_POST["id"];
	$password = $_POST["pwd"];

$sql = "select loginID from user where password=PASSWORD(?);";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_bind_param($stmt, "s", $password); //bind parameters with variables
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
if ($rs = mysqli_fetch_assoc($result)) {
	if ($rs['loginID'] == $loginID) {
		$_SESSION["userID"] = $loginID; //�ŧisession �ܼƨë��w��
		header("Location: 1.listUI.php");
	} else {
		$_SESSION["userID"] = '';
		header("Location: 0.loginUI.php");
	}
}
?>
