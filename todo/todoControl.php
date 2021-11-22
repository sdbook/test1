<?php
require('todoModel.php');

$act=$_REQUEST['act'];
switch ($act) {
	case "addJob":
		$title=$_POST['title'];
		$note=$_POST['note'];

		if ($title) {
			addJob($title,$note);
		}
		header("Location: 1.listUI.php");
		break;
	case "setFinish":
		$id=(int)$_REQUEST['id'];
		if ($id>0) {
			setFinished($id);
		}
		header("Location: 1.listUI.php");
		break;
	default:
}
?>

