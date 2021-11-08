<?php
	session_start(); //啟用session 功能, 必須在php程式還沒輸出任何訊息之前啟用
	$_SESSION["userID"] = ""; //宣告session 變數並指定值
?>
<hr>
<form method="post" action="0.login.php">
ID <input type="text" name="id"> <br>
Password <input type="text" name="pwd"> <br>
<input type="submit">
</form>