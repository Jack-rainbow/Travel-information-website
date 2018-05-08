<?php
	
	header('Content-type:text/html;charset=utf8');
	include 'header.php';
?>
	<ul class="breadcrumb">
				<li>
					<a href="index.php">首页</a>
				</li>
				<li>注册</li>
			</ul>
			<br /><br />
			<div>
				<h1 class="h1">用户登录</h1>
				<hr />
			</div>

		<!--login-->
			<form class="form-horizontal" method="post"  action="state/inputyanhzneg.php" id="biaodan">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label" >用户名</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputEmail2" placeholder="用户名" name="username" value="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">输入密码</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputPassword3" placeholder="输入密码" name="password" value="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">确认密码</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputEmail4" placeholder="确认密码" name="password1" value="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputEmail5" placeholder="Email"  name="email" value="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">手机号</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputEmail6" placeholder="手机号" name="tel" value="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputArea" class="col-sm-2 control-label">地区</label>
					<div class="col-sm-10">
						<select name="shengfen" class="form-control" id="inputArea">
							<option  value="0">请选择省份</option>
							<option>北京</option>
							<option>上海</option>
							<option>广东</option>
						</select>
					
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">爱好</label>
					<div class="col-md-10 checkbox">
						<label><input type="checkbox" name="hobby[]" value="音乐" id="hobby">音乐</label> 
						<label><input type="checkbox" name="hobby[]" value="旅游" id="hobby">旅游</label>
						<label><input type="checkbox" name="hobby[]" value="登山" id="hobby">登山</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">性别</label>
					<div class="col-md-10 radio">
						<label><input type="radio" name="sex" id="man"  value="男">男</label> <label><input type="radio" value="女" name="sex" id="woman">女</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-10 col-md-offset-2">
						<label><input type="checkbox" name="xieyi"> 阅读并接受</label>
						<a>《用户协议》</a>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success " id="login">登录</button>
						<button type="reset" class="btn btn-default">重置</button>
						<a href="login.php" class="btn btn-danger">已有账号，去登录</a>
					</div>
				</div>
			</form>
			<!--footer-->
			
<?php
	include 'footer.php';
?>

		<script>
		var oPt=document.getElementsByTagName("input");
		var login=document.getElementById("login");/*登录按钮*/
		var bdan=document.getElementById("biaodan");/*form*/
		var mingzi=document.getElementById("inputEmail2");/*姓名*/
		var mima=document.getElementById("inputPassword3").value;/*密码*/
		var qmima=document.getElementById("inputEmail4");/*确认密码*/
		var emayj=document.getElementById("inputEmail5");/*email*/
		var shouji=document.getElementById("inputEmail6");/*手机*/
		var dizhi=document.getElementById("inputEmail7");/*地区*/
		var man=document.getElementById("man");/*性别*/
		var woman=document.getElementById("woman");/*性别*/
		/*判断男女去判断他的是否选中选下标()*/
		bdan.onsubmit=function(){
			if(bdan.getAttribute("method")=="post"){
			/*姓名--------------------------------*/		
				var str=mingzi.value;/*姓名*/
				if(str!=""){
					var re=/(^\s+)|(\s+$)/g;
					var yanwan=str.replace(re,"");/*去空格的用户名*/
					var sta=/^[a-zA-Z0-9]{5,10}$//*用户名只能输入数字并且是5-10*/
					if(sta.test(yanwan)!==true){
						alert("用户名格式错误");
						return false;
					}
				}else{
					alert("用户名不能为空");
					return false;
				}
			/*密码--------------------------------*/
				var str1=mima.value;/*密码*/
				var str2=qmima.value;/*确认密码*/
				if( bdan.password.value == '' )
					{
						alert('密码不能为空');
						return false;
					};
					
					re = /^\w{5,16}$/;
					//英文数字下划线 5-20
					if( !re.test(bdan.password.value) )
					{
						alert('密码格式不正确');
						return false;
					};
					
					if(bdan.password.value != bdan.password1.value)
					{
						alert('两次密码不正确');
						return false;
				};
			
				/*if(str1===str2){
					var re=/(^\s+)|(\s+$)/g;
					var yanwan=str1.replace(re,"");
					var sta=/\d{2}/;
					if(sta.test(str2)!==true){
						alert("密码长度错误");return false;
					}
				}else if(str1==""||str2==""){
					alert("密码不能为空");return false;
				}else{
					alert("密码格式错误");return false;
				}*/
			/*邮件--------------------------------*/
				var str3=emayj.value;/*邮件*/
				if(str3==""){
					alert("邮件不可以为空");
					return false;
				}else{
					/*var re=/(^\s+)|(\s+$)/g;
					var yanwan=str3.replace(re,"");/*去空格的用户名*/
					//var sta=/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
					var sta=/^\w+@\w+\.\w+$/;
					if(!sta.test(str3)){
						alert("邮件格式错误");return false;
					}
				}
			/*手机--------------------------------*/
				var str4=shouji.value;/*手机*/
				
				if(str4==""){
					alert("手机不可以为空");return false;
				}else{
					var re=/(^\s+)|(\s+$)/g;
					var yanwan=str4.replace(re,"");/*去空格的用户名*/
					var sta=/1[3,5,6,7,8,9]\d{8}/; 
					if(sta.test(yanwan)!==true){
						alert("邮件格式错误");return false;
					}
				}
			/*地区--------------------------------*/
				//var str5=dizhi.value;/*地区*/
				if(bdan.shengfen.value=="0"){
					alert("请选择省份");
					return false;
				}
			/*性别--------------------------------*/	
				/*if(man.checked!==true && woman.checked!==true){
					alert("选一个性别吧！");return false;
				}*/
				var flag=false;
				for(var i=0;i<bdan.sex.length;i++){
					if(bdan.sex[i].checked){
						
						flag=true;
					}
				}
				if(!flag){
					alert("请选择性别");
					return false;
				}
			/*爱好--------------------------------*/	
				var flag=false;
				for(var i=0;i<bdan.hobby.length;i++){
					if(bdan.hobby[i].checked){
						flag=true;
					}
				}
				if(!flag){
					alert("请选择爱好");
					return false;
				}
			/*协议*/
				var flag=false;
				if(bdan.xieyi.checked){
					return true;
				}
				if(!flag){
					alert("请认真阅读协议");
					return false;
				}
			/*以上都符合执行*/
			}else{
				alert("不是post,弹什么数据,不安全地！");
				bdan.setAttribute("action","");
				return false;
			}
		}
	</script>
	</body>

</html>