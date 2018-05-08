<?php
	header('Content-type:text/html;charset=utf8');
	
	$conn = new mysqli('localhost','root','root','mytest');
	
	if( $conn->connect_error )
	{
		die('连接错误');
	};
?>