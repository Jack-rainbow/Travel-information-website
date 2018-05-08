<?php
	include 'sql.php';
	$id=$_GET['id'];
	$sql = "DELETE FROM ht_fabu WHERE ht_id=$id";
	if($conn->query($sql))
	{
		$srk='删除成功';
		$jumpUrl='column.php';
		include '../tip.php';
		exit;
	}else{
		$srk='删除失败';
		$jumpUrl='column.php';
		include '../tip.php';
		exit;
	}

?>