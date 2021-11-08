<?php
	//Session 使用範例
	session_start(); //啟用session 功能, 必須在php程式還沒輸出任何訊息之前啟用
	//$_SESSION["varName"] = "session ok"; //宣告session 變數並指定值

	if ( isset($_SESSION["keyValue"])) {
		echo "Session['keyValue']=" . $_SESSION["keyValue"] . "<br>";
	} else {
		echo "Session['keyValue'] does not exist!<br>";
	}

	if ( isset($_COOKIE["keyValue"])) {
		echo "cookie['keyValue']=" . $_COOKIE["keyValue"] . "<br>";
	} else {
		echo "cookie['keyValue'] does not exist!<br>";
	}

/*
	$a = $_SESSION["keyValue"]; //取得session 變數 keyValue 的值
	unset($_SESSION['變數名稱']); //取消session 變數的宣告

	//cookie使用範例
	setcookie("cookieName", "cookieValue", time()+36000); // 設定cookie值與有效時間
	$b= $_COOKIE["cookieName"]; //取得cookie的值
	echo $a, $b;

*/
?>
<hr>
<form method="post" action="session-set.php">
Input Key value <input type="text" name="keyValue">
<input type="submit">
</form>