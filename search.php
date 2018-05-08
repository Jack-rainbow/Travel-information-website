<style type="text/css">
	#seach{
		height: 200px;
		border: 1px solid #999;
		display: none;
	}
</style>
<?php
	include 'header.php';
?>

	<ul class="breadcrumb">
		<li><a href="index.php">首页</a></li>
		<li>搜索</li>
	</ul>
	<br /><br /><br /><br />
	<!--search-->
	<form class="form-inline text-center"  method="post" >
	  <div class="form-group">
	    <label for="search" class="sr-only">请输入要搜索的内容</label>
	    <input type="text" class="form-control" id="txt1" placeholder="请输入要搜索的内容" value="">
	  </div>
	  <button type="submit" class="btn btn-default">搜索</button>
	</form><br />
	<div id="div1"></div><br /><br />
	<!--footer-->
	<?php
		include 'footer.php';
	?>
	<script type="text/javascript">
		

	var oTxt = document.getElementById('txt1');
	var oDiv = document.getElementById('div1');
	
	oTxt.onkeyup = function()
	{
		//alert( this.value );
		//return false;
		
		if( this.value == '' )
		{
			oDiv.innerHTML = '';
			return false;
		};
		
		ajax( 'state/sear.php',this.value );
	};
	
	function ajax(url,q)
	{
		if( window.XMLHttpRequest )
		{
			var Ajax = new window.XMLHttpRequest();
		}
		else
		{
			var Ajax = new ActiveXObject('Microsoft.XMLHTTP');
		};
		
		//2 拨号
		
		Ajax.open('get',url+'?q='+ q +'&t='+Math.random(),true);//3个参数  get/post  url   true/false   http://localhost/php/day10/1.txt
		
		//3发送请求
		Ajax.send();
		
		Ajax.onreadystatechange = function()
		{
		
			if( Ajax.readyState == 4 && Ajax.status == 200 )
			{
				//alert( Ajax.responseText );
				oDiv.innerHTML = Ajax.responseText;
			};
		};
	};

</script>