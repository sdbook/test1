<?php
require("phpModel.php");
$id=(int)$_POST['i'];
$dataStr = $_POST['dat'];
$data = json_decode($dataStr);

/*
$name = $_POST['name'];
...

*/

//$sql="update xxxTable where id=?";
updateData($id, $data);
echo "OK";
?>