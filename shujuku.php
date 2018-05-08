<?php
header('Content-type:text/html;charset=utf8');

$conn = new mysqli('localhost','root','root','mytest');

if( $conn->connect_error )
{
	die('连接错误');
};


//2 写sql语句

$sql = "CREATE TABLE u_user2(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL,
	age int(3),
	email VARCHAR(50),
	reg_date TIMESTAMP
)";

if($conn->query( $sql ))
{
	echo '创建成功';
};




?>