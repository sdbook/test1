<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>hello world</p>
<hr />
<?php

if (! isset($_GET["a"]) or ! isset($_GET["b"])) {
	die "There is no required parameter!";
}

$tot=(int)$_GET["a"];
$msg =$_GET['b'];

echo "Got the parameter: a=$tot, and b=$msg";
?>
</body>
</html>
