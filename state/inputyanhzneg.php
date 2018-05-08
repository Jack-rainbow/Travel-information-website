<?php 
/*如果页面中出现乱码而php中也加了 header记得去phpstudy中查看端口*/
/*1.POST提交
 *2.判断是否为空 
 *3.trim（）去除首尾空格 
 *5.代码实体化 
 *6.验证数据格式  
 * */
 /*exit; 终止代码执行
  * 与js中的return false 大致相同
  * 
  * 前台只要只要遇到多选的时候记得加name[]
  * 后台会获取到一个数组 并且把这些数依次PUSH进去
  * 文件默认打开是GET所以才会报未定义错误
  * 
  * 获取性别，爱好 （多个选项）必须在html中添加value值
  * 而爱好多个选项需要给name后边加[] 因为是一字数组 具体需去百度查
  * preg_match PHP中检测匹配到的字符
  * */
  
	header('Content-type:text/html;charset=utf8');
	$username = $password = $password1 = $email = $tel = $shengfen = $sex =$hobbyStr=$xieyi='';
	$srk = '';
	$jumpUrl='../zhuce.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		/*验证用户名*/
		if (empty($_POST['username'])) {
			//echo '用户名不能为空';
			$srk='用户名不能为空';
			include '../tip.php';
			exit;
		} else {
			//$username = input_fn($_POST['username']);
			$re = '/^[a-zA-Z0-9]{5,10}$/';
			if (!preg_match($re, $_POST['username'])) {
				$srk='用户名格式不正确';
				include '../tip.php';
				exit;
			};
		};
	
		//验证手机
		if (empty($_POST['tel'])) {
			$srk='电话不能为空';
			include '../tip.php';
			exit;
		} else {
			$tel = input_fn($_POST['tel']);
			$re = '/1[35678]\d{9}/';
	
			if (!preg_match($re, $tel)) {
				$srk='电话格式不正确';
				include '../tip.php';
				exit;
			};
		};
	
		//验证性别
		if (empty($_POST['sex'])) {
			$srk='请选择性别';
			include '../tip.php';
			exit;
		}
		//验证密码
		if (empty($_POST['password'])){
			$srk='密码不能为空';
			include '../tip.php';
			exit;
		} else {
			$password = input_fn($_POST['password']);
			$re = '/^\w{5,16}$/';
			if (!preg_match($re, $password)) {
				$srk='密码格式不正确';
				include '../tip.php';
				exit;
			};
		};
		if( $_POST['password'] != $_POST['password1']  )
		{
			$srk='两次密码不一致';
			include '../tip.php';
			exit;
		};
		//验证Email
		if (empty($_POST['email'])) {
			$srk='Email不能为空';
			include '../tip.php';
			exit;
		} else {
			$email = input_fn($_POST['email']);
			//$re = '/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/';
			$re='/^\w+@\w+\.\w+$/';
			if (!preg_match($re, $email)) {
				$srk='邮箱格式不正确';
				include '../tip.php';
				exit;
			};
		};
		//验证爱好
		$hobbyStr = '';
			if( empty($_POST['hobby']) )
			{
				$srk='请选择一个爱好吧';
				include '../tip.php';
				exit;
			}
			else
			{
				for($i=0;$i<count($_POST['hobby']);$i++)
				{
					
					if( empty($hobbyStr) )
					{
						$hobbyStr .= $_POST['hobby'][$i];
					}
					else
					{
						$hobbyStr .= '|'.$_POST['hobby'][$i];
					};
				};
		};
		//验证地区
		if($_POST['shengfen']=='0'){
			$srk='请选择地区！';
			include '../tip.php';
			exit;
		}
		//无需验证协议
		if(empty($_POST['xieyi'])){
			$srk='请选择协议！';
			include '../tip.php';
			exit;
		}
		
	}
	
	/*传参数*/
	function input_fn($data) {
		$outData = trim($data);
		/*PHP中去除首尾空格 JQ也一样*/
		$outData = htmlspecialchars($outData);
		/*htmlspecialchars 转为HTML字体*/
		return $outData;
	};
	
	/*验证数据----------------------------*/
	$conn = new mysqli('localhost','root','root','mytest');

	if( $conn->connect_error )
	{
		die('连接失败');
	};
	
	$username = input_fn( $_POST['username'] );
	$password = input_fn( $_POST['password'] );
	$email = input_fn( $_POST['email'] );
	$tel = input_fn( $_POST['tel'] );
	$shengfen = input_fn( $_POST['shengfen'] );
	$sex = input_fn( $_POST['sex'] );
	$password=md5($password);	
	$sql = "INSERT INTO user (username,password,tel,email) VALUES('$username','$password',$tel,'$email')";
	$usern="SELECT * FROM user WHERE username='$username'";
	$result=$conn->query($usern);
	if($result->num_rows>0){
		$srk='用户名已存在！';
		include '../tip.php';
		exit;
	}
	if( $conn->query($sql) )
	{
		$srk='注册成功！';
		include '../tip.php';
		exit;
	}	
	else
	{
		$srk='非法注册！';
		include '../tip.php';
		exit;
	};	
	
	
	
	
	/*$userinfo='';
	$userinfo = $username.'-----'.$password.'-----'.$sex.'-----'.$tel.'-----'.$email.'-----'.$shengfen;
	
	
	
	
	$file = fopen('../shuju.txt','a+');//a+读写           a是写入          r+读写               r只读
	while( $f = fgets( $file ) )  // fgets从文件指针中读取一行(一行一行的读取)
	{
		$userArr = explode('-----',$f);//explode — 使用一个字符串分割另一个字符串
		$srk='';//置空
		if( $userArr[0] == $username)
		{	
			$srk = '已经存在';
			$jumpUrl = '../zhuce.php';
			include '../tip.php';
			exit;
		};
	};
	//"\r\n" 强制换行
	if(fwrite($file, $userinfo."\r\n")){
		$srk = '注册成功';
		//fwrite($file, $userinfo."\r\n");
		$jumpUrl = '../login.php';
		include '../tip.php';
		exit;
	}else{
		echo '注册失败';
		$jumpUrl = '../zhuce.php';
	}*/
?>