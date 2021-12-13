<?php
require_once("dbconfig.php");
function addJob($title,$note) {
	global $db;
	$sql = "insert into todo (title, note) values (?, ?)";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ss", $title, $note); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL

	return true;
}

function getJobList($type=0) {
	global $db;
	/*
	$a=array();
	$a['id']=10;
	$a['title']='test';
	$a['note']='note';
	$a['start']='123';
	$a['finish']=null;
	$aa[]=$a;
	return  $aa;
	*/
	if ($type==1) { //已完成工作
		$sql = "select * from todo where not isnull(finish) order by id desc;";
	} else if ($type==2) { //未完成工作
		$sql = "select * from todo where isnull(finish) order by id desc;";
	} else { //所有工作
		$sql = "select * from todo order by id desc;";		
	}
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt); 

	$retArr=array();
	while (	$rs = mysqli_fetch_assoc($result)) {
		$tArr=array();
		$tArr['id']=$rs['id'];
		$tArr['title']=$rs['title'];
		$tArr['note']=$rs['note'];
		$tArr['start']=$rs['start'];
		$tArr['finish']=$rs['finish'];
		$retArr[] = $tArr;
	}
	return $retArr;
}


function setFinished($id){
	global $db;
	$sql = "update todo set finish=now() where id=?;";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL

	return true;
}
?>