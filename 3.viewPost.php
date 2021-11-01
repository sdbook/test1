<?php
require("dbconfig.php");
if(isset($_GET['id'])) {
	$id=(int)$_GET['id'];
} else {
	echo "invalid id";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<a href="1.listUI.php">Back</a><br>
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
$sql = "select * from guestbook where id=?;";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
$rs = mysqli_fetch_assoc($result); 

	echo "<tr><td>" , $rs['id'] ,
	"</td><td>", $rs['title'],
	"</td><td>" , $rs['msg'], 
	"</td><td>", $rs['name'], "</td>",
	"</td><td>", $rs['likes'], "</td>",
	"<td><a href='2.like.php?id=", $rs['id'], "&t=1'>Like</a> ",
	"<a href='2.like.php?id=", $rs['id'], "&t=-1'>Dislike</a> ",
	"<a href='2.delete.php?id=", $rs['id'], "'>Delete</a> ",
	"<a href='1.editUI.php?id=", $rs['id'], "'>Edit</a></td></tr>";
?>
</table>
<?php
//fetch responses of this post
$sql = "select * from `response` where mid=? order by id;";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 

while (	$rs = mysqli_fetch_assoc($result)) {
	echo "<p>",$rs['msg'],"</p>";
}
?>
<form method="post" action="3.response.php">
    <td><label>
      <input name="mid" type="hidden" value="<?php echo $id;?>" />
      <input name="msg" type="text" id="msg" />
    </label></td>
    <td><label>
      <input type="submit" name="Submit" value="送出" />
    </label></td>
	</form>
</body>
</html>
