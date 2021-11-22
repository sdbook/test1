<?php
require("todoModel.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p><a href='1.insertUI.php'>Add</a>
</p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>note</td>
    <td>start</td>
	<td>finish</td>
  </tr>
<?php

$result = getJobList(); 
foreach ($result as $job){
	echo "<tr><td>" , $job['id'] ,
	"</td><td>", $job['title'],
	"</td><td>" , $job['note'], 
	"</td><td>", $job['start'], "</td>",
	"</td><td>", $job['finish'], "</td>";
	echo "</tr>";
}
?>
</table>
</body>
</html>
