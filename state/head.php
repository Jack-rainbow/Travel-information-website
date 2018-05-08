<?php
session_start();

if( empty($_SESSION['htuser']) )
{
	$srk = '没有登录，请登录';
	$jumpUrl = 'admin.php';
	include '../tip.php';
	exit;
};

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <!--  <link rel="stylesheet" type="text/css" href="../css/site.css">-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="../umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="../umeditor/lang/zh-cn/zh-cn.js"></script>
</head>

<body>
	<div class="container">
    	<div class="projects-header page-header">
        	<h2>后台信息系统 <small>欢迎您：<?php echo $_SESSION['htuser']; ?><a href="exit.php">注销</a></small></h2>
   		</div>
        <div class="row">
        	<div class="col-md-3">
            	<ul class="list-group">
                  <li class="list-group-item list-group-item-success">文章栏目</li>
                  <li class="list-group-item"><a href="list.php?column=<?php echo '去哪儿网'?>">去哪儿网</a></li>
                  <li class="list-group-item"><a href="list.php?column=<?php echo '携程旅游'?>">携程旅游</a></li>
                  <li class="list-group-item"><a href="list.php?column=<?php echo '同程旅游'?>">同程旅游</a></li>
                  <li class="list-group-item"><a href="list.php?column=<?php echo '蜜蜂旅游'?>">蜜蜂旅游</a></li>
                  <!-- <li class="list-group-item"><a href="list.php?column=<?php echo '健身1'?>">健身1</a></li> -->
                  <li class="list-group-item list-group-item-success"><a href="publish.php">上传</a></li>
                </ul>
            </div>
            <div class="col-md-9" style="border-left:1px solid #eaeaea;">