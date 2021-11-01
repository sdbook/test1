<?php
require("dbconfig.php");
if(isset($_GET['id'])) {
	$id=(int)$_GET['id'];
} else {
	$id=0;
}

if ($id>0) {
	$sql = "update guestbook set `likes`=likes+1 where id=?;";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);

	//echo "liked.";
	header("Location: 1.listUI.php");
} else {
	echo "empty id, cannot like.";
}
?>
