<?php
require("phpModel.php");
$id=(int)$_POST['i'];
//this is for the first way to get the posted stringify json data
$dataStr = $_POST['dat'];
$data = json_decode($dataStr);
//$data['name']
/*
//this is for another way to get the post data without json stringify
//this is the traditional way
$name = $_POST['name'];
...

*/

//$sql="update xxxTable where id=?";
updateData($id, $data);
echo "OK";
?>