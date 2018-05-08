<?php
	session_start();
	header('Content-type:text/html;charset=utf8');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username=$_POST['username'];
		$password=$_POST['password'];
		/*获取sql数据*/
		$file=new mysqli('localhost','root','root','mytest');
		 if($file->connect_error){
		 	//-> 代表使用$conn中方法
		 	die('连接错误');
			//die终止程序并且打印出参数
		 };
		$yanzheng='SELECT h_username,h_password FROM htname';
		$result=$file->query($yanzheng);
		$row = $result->fetch_assoc();
		if($row['h_username']==$username&& $row['h_password']==$password){
			$_SESSION['htuser'] = $_POST['username'];
			$srk = '登录成功';
			$jumpUrl = './column.php';
			include '../tip.php';
			exit;
		}else{
			$srk = '登录错误';
			$jumpUrl = './admin.php';
			include '../tip.php';
			exit;
			
		}
		
		/*//$f=file_get_contents('../shuju.txt');可以读取所有数据
		if($username==''||$password=''){
			$srk = '登录失败';
			$jumpUrl = './admin.php';
			include '../tip.php';
			exit;
		}else{
			$file=fopen('../shuju.txt', 'r');
			while($f=fgets($file)){
				$useArr=explode('-----', $f);
				if($useArr[0]==$username){
					$srk = '登录成功';
					$jumpUrl = './column.php';
					include '../tip.php';
					exit;
				}
			}
		}*/
		
	}
	
?>