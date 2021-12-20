<?php
require("phpModel.php");
$id=(int)$_GET['id'];
//$sql="select * from xxxTable where id=?";
$rs=getData($id);
echo json_encode($rs);
?>