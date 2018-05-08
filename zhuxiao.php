<?php
	header('Content-type:text/html;charset=utf8');
	session_start();
	$srk = '注销成功';
	$jumpUrl = 'login.php';
	if( !empty($_SESSION['qtueser']) )
		{
			unset($_SESSION['qtueser']);
			include 'tip.php';
			exit;
	}
	elseif(!empty($_COOKIE['qtueser']))
	{
		setcookie('qtueser','1',time()-1,'/');
		include 'tip.php';
		exit;
	}
?>