<?php
require_once("dbconfig.php");
if(isset($_REQUEST["f"])) {
	$f2 = $_REQUEST["f"] . "%";
} else {
	$f2='%';
}

$sql="select * from todo where title like ?";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "s", $f2); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
	$result = mysqli_stmt_get_result($stmt);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
echo json_encode($rows);
?>
