<?php
	include 'header.php';
?>
<?php
/*session_start();
	if( !empty($_SESSION['qtueser']))
	{
			$msg = '己登录，无须重复登录';
			$jumpUrl = 'index.php';
			include 'tip.php';
			exit;
	};*/
?>
	<ul class="breadcrumb">
		<li><a href="">首页</a></li>
		<li>搜索</li>
	</ul>
	<br /><br />
	<div>
		<h1 class="h1">用户登录</h1>
		<hr />
	</div>
	<!--login-->
		<form class="form-horizontal" method="post" action="state/loginp.php">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputEmail3" placeholder="用户名" name='username'>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name='password'>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-10 col-md-offset-2">
		      <input type="checkbox" name="miandl" value="1">
		      <label for="inputPassword4" >7天免登录</label>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-success">登录</button>
		      <button type="reset" class="btn btn-default">重置</button>
		      <a href="zhuce.php" class="btn btn-danger">还没有账号，去注册</a>
		    </div>
		  </div>
		</form>
	<!--footer-->
	<?php
		include 'footer.php';
	?>