<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my guest book !!   	<a href='1.insertUI.php'>Add</a></p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>name</td>
	<td>-</td>
  </tr>
<?php
require("dbconfig.php");
$sql = "select * from guestbook order by id desc;";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 

while (	$rs = mysqli_fetch_assoc($result)) {

	echo "<tr><td>" , $rs['id'] ,
	"</td><td>" , $rs['title'],
	"</td><td>" , $rs['msg'], 
	"<td>", $rs['name'], "</td>",
	"<td><a href='2.delete.php?id=", $rs['id'], "'>Delete</a> ",
	"<a href='1.editUI.php?id=", $rs['id'], "'>Edit</a></td></tr>";
}
?>
</table>
</body>
</html>
