<?php
require('todoModel.php');

if (isset($_REQUEST['act'])) {
	$act=$_REQUEST['act'];
} else $act='';

switch ($act) {
	case "addJob":
		$title=$_POST['title'];
		$note=$_POST['note'];

		if ($title) {
			addJob($title,$note);
		}
		echo "OK";
		break;
	case "setFinish":
		$id=(int)$_REQUEST['id'];
		if ($id>0) {
			setFinished($id);
		}
		echo "OK";		
		break;
	case "getList":
		$list = getJobList(2);
		echo json_encode($list);
		break;
	default:
}
?>

