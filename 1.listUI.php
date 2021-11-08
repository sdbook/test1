<?php
require("dbconfig.php");
if ( ! (checkAccess(1))) {
	header("Location: 0.loginUI.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p><?php echo "hello ",$_SESSION['userID'];  ?>	<a href='1.insertUI.php'>Add</a>
<a href='0.loginUI.php'>logout</a>
</p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>name</td>
    <td>讚</td>
	<td>-</td>
  </tr>
<?php

$sql = "select * from guestbook order by id desc;";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 

while (	$rs = mysqli_fetch_assoc($result)) {
	$id=$rs['id'];
	echo "<tr><td>" , $rs['id'] ,
	"</td><td><a href='3.viewPost.php?id=$id'>" , $rs['title'],"</a>",
	"</td><td>" , $rs['msg'], 
	"</td><td>", $rs['name'], "</td>",
	"</td><td>", $rs['likes'], "</td>",
	"<td><a href='2.like.php?id=", $rs['id'], "&t=1'>Like</a> ",
	"<a href='2.like.php?id=", $rs['id'], "&t=-1'>Dislike</a> ";
	if (checkAccess(5)) {
		echo "<a href='2.delete.php?id=", $rs['id'], "'>Delete</a> ",
		"<a href='1.editUI.php?id=", $rs['id'], "'>Edit</a>";
	}
	echo "</td></tr>";
}
?>
</table>
</body>
</html>
