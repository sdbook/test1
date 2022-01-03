<?php
session_start();
require("dbconnect.php");
$sql = "select * from guestbook;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta http-equiv="refresh" content="1"> -->
<title>無標題文件</title>
</head>

<body>

<p>my guest book !! <a href='addMessageForm.php' target="_blank">Add New Msg</a></p>
<button onclick='reloadPage()'>Reload</button>
<hr />
<div id="main">
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>name</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['title']}</td>";
	echo "<td>" , $rs['msg'], "</td>";
	echo "<td>" . $rs['name'] . "</td></tr>";
}
?>
</table>
</div>
<script>
//settimeout example
function reloadPage() {
	//window.location.reload();	
	fetch()......
	setTimeout(reloadPage, 1000);
}
setTimeout(reloadPage, 1000);

//setinterval example
function reloadData() {
	//window.location.reload();	
	fetch()......
}
setInterval(reloadData, 3500);

</script>
</body>
</html>
