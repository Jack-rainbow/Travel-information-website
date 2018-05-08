<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Face博客</title>
		<style>
			#box{
				/*background: url(./img/tiaozhuan.jpg) no-repeat;*/
				width: 500px;
				height: 300px;
				color: #fff;
				text-align: center;
				padding-top: 0px;
				background-size: 100%;
				border: 1px solid #C4E3F3;
				box-shadow: 0px 1px 10px #fff; 
			}
			body{
				font-size:30px;
				background-color: #999;	
			}
			#bb{
				position:absolute;
				left:50%;
				top:50%;
				transform:translate(-50%,-50%);
			}
			body{
				background: url(../img/bj.jpg) no-repeat;
				background-position: center 0;  
				background-size: cover;  
				/* background-attachment: fixed;   */
			}
		</style>
	</head>
	<body>
		<div id="bb">
			<div id="box">
				<h2><?php echo $srk; ?></h2>
				<dl>
					<dt>还有<span>3</span>秒跳转,不想等待<a href="<?php  echo $jumpUrl; ?>" id="oA">请单击</a></dt>
				</dl>
			</div>
		</div>
	</body>
	<script>
		var sP=document.getElementsByTagName("span");
		var oA=document.getElementById("oA").href;
		var timer=null;
		var num = sP[0].innerHTML;
		time=setInterval(function(){
			num--;
			if(num<=0){
				clearInterval(timer);
				num=0;
				window.location.href=oA;
				//alert(window.location.href);
			}
			sP[0].innerHTML=num;
		},1000)
	</script>
</html>