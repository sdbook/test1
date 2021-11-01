<?php
require("dbconfig.php");
if(isset($_GET['id'])) {
	$id=(int)$_GET['id'];
} else {
	$id=0;
}

$t=(int)$_GET['t'];

if ($id>0) {
	if ($t == 1) {
		$sql = "update guestbook set `likes`=likes+1 where id=?;";
	} elseif ($t == -1) {
		$sql = "update guestbook set `likes`=likes-1 where id=?;";
	} else {
		exit;
	}
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);

	//echo "liked.";
	header("Location: 1.listUI.php");
} else {
	echo "empty id, cannot like.";
}
?>
