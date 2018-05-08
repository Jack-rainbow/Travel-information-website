<?php
	header('Content-type:text/html;charset=utf8');
/*	session_start();
	if(empty($_SESSION['qtueser']) && empty($_SESSION['zhuce'])){
		$_SESSION['qtueser']='登录';
		$_SESSION['zhuce']='注册';	
	}*/
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/index.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Travel博客</title>
	</head>

	<body>
		<nav class="navbar navbar-default navbar-inverse nav">
			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
					<a class="navbar-brand active" href="index.php">网站首页</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="webzixun.php">博客内容</a>
						</li>
						<li>
							<a href="kexuanze.php">博客分享列表</a>
						</li>
						<li>
							<a href="xihuankecheng.php">内容投票</a>
						</li>
						<li>
							<a href="search.php">搜索</a>
						</li>
						<?php
							if(!empty($_COOKIE['qtueser']))
							{	
						?>
						<li><a href="javascript:void(0)">欢迎您：<?php echo $_COOKIE['qtueser']; ?></a></li>
						<li><a href="zhuxiao.php">注销</a></li>
						<?php
							}elseif(!empty($_SESSION['qtueser'])){
								
							
						?>
						<li><a href="javascript:void(0)">欢迎您：<?php echo $_SESSION['qtueser']; ?></a></li>
						<li><a href="zhuxiao.php">注销</a></li>
						<?php
							}else{
								
								
						?>
						<li><a href="zhuce.php">注册</a></li>
						<li><a href="login.php">登录</a></li>
						<?php
							}
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">关于我</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<!--banner图片-->
			<div id="myCarousel" class="carousel slide">
				<!-- 轮播（Carousel）圆点 -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>
				<!-- 轮播（Carousel）图片-->
				<div class="carousel-inner piclb">
					<div class="item active">
						<img src="img/banner.png" alt="First slide">
					</div>
					<div class="item">
						<img src="img/banner1.png" alt="Second slide">
					</div>
				</div>
				<!-- 轮播（Carousel）翻页 -->
				<a class="carousel-control left" href="#myCarousel" data-slide="prev"></a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next"></a>
			</div>
			
		