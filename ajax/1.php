this is page 1<br>
<?php
if(isset($_REQUEST["f"])) {
	$f1 = $_REQUEST["f"];
	echo "got parameter: f= $f1";
}
?>
