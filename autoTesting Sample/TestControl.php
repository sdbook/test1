<?php
require("model.php");
$act=$_POST['act'];
switch($act) {
	case "avg":
		$a = (int)$_POST['v1'];
		$b = (int)$_POST['v2'];
		echo getAvg($t[0], $t[1]);
		break;
	case "max":
		$a = (int)$_POST['v1'];
		$b = (int)$_POST['v2'];
		echo getMax($t[0], $t[1]);
		break;
	default:
		echo "nothing to do";
}
?>