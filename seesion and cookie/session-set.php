<?php
	session_start(); //�ҥ�session �\��, �����bphp�{���٨S��X����T�����e�ҥ�
	$val = $_POST["keyValue"];
	
	$_SESSION["keyValue"] = $val; //�ŧisession �ܼƨë��w��
	setcookie("keyVallue", $val, time()+36000); // �]�wcookie�ȻP���Įɶ�
?>
ok!!
<a href="session-get.php">get session value</a>