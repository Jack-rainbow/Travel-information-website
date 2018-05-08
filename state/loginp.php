<?php
	session_start();
	header('Content-type:text/html;charset=utf8');
		$username=$password=$miandl='';
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//feof判断是不是文件结束的位置           while(!feof($open))   代表文件在文件最后
			$username = $_POST['username'];
			$password = $_POST['password'];
			/*cookie与session*/
			
			/*验证数据----------------------------*/
			$conn = new mysqli('localhost','root','root','mytest');//链接数据K
			
			if( $conn->connect_error )//判断是否链接成功
			{
				die('连接失败');
			};
			$usen = "SELECT username,password FROM user";//查询SQL中的值
			$result = $conn->query( $usen );//函数执行sql 查询。
			 //while( 
			 $row = $result->fetch_assoc();//)
			//{
				//var_dump($row['username']);
				//echo $row['password'];
				
				if($username==$row['username']){
				//if( $result->num_rows > 0)
				//{
							if( $row['username'] == $username && $row['password'] == mad5($password))
							{
								if(!empty($_POST['miandl'])){//不选择7天免登录的时候，设置session
									setcookie('qtueser',$_POST['username'],time()+7*24*60*60,'/');
								}else{
									$_SESSION['qtueser']=$_POST['username'];
								}	
								$srk = '登录成功';
								$jumpUrl = '../index.php';
								include '../tip.php';
								exit;	
								
							}
							/* $row['password'] !== md5($password */
							elseif ($row['password'] !== mad5($password)) 
							{	
								$srk = '密码错误,请再次登录！';
								$jumpUrl = '../login.php';
								include '../tip.php';
								exit;
							}
						
						
				}
			//}
			
			
		
			
			/*$open=fopen('../shuju.txt', 'r');
			while($f =fgets($open)){
				$read = explode('-----',$f);
					if(!empty($_POST['miandl'])){//不选择7天免登录的时候，设置session
						setcookie('qtueser',$_POST['username'],time()+7*24*60*60,'/');
					}else{
						$_SESSION['qtueser']=$_POST['username'];
					}
					if($username==$read[0]){
						if( $read[0] == $username&&$read[1] == $password)
						{	
							$srk = '登录成功';
							$jumpUrl = '../index.php';
							include '../tip.php';
							exit;	
							
						}
						elseif ($read[1] !== $password) 
						{	//echo $read[1];
							$srk = '密码错误,请再次登录！';
							$jumpUrl = '../login.php';
							include '../tip.php';
							exit;
						}
					
					
				}
			}
			*/
			//if($username == ''|| $password ==''){
			$srk = '登录失败';
			$jumpUrl = '../login.php';
			include '../tip.php';
			exit;
			//}  
							
					
		}
?>