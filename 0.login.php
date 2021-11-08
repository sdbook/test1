<?php
require("dbconfig.php");
	 //啟用session 功能, 必須在php程式還沒輸出任何訊息之前啟用
	$loginID = $_POST["id"];
	$password = $_POST["pwd"];

$sql = "select loginID from user where password=PASSWORD(?);";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_bind_param($stmt, "s", $password); //bind parameters with variables
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
if ($rs = mysqli_fetch_assoc($result)) {
	if ($rs['loginID'] == $loginID) {
		$_SESSION["userID"] = $loginID; //宣告session 變數並指定值
		header("Location: 1.listUI.php");
	} else {
		$_SESSION["userID"] = '';
		header("Location: 0.loginUI.php");
	}
}
?>
