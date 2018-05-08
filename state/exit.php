<?php
session_start();
if(!empty($_SESSION['htuser'])){
	unset($_SESSION['htuser']);
	$srk = '注销成功';
	$jumpUrl = 'admin.php';
	include '../tip.php';
	exit;
	
}
?>