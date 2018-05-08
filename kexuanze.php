<?php
	include 'header.php';	
?>
	<script type="text/javascript">
		function change(page){
			var changeValue = document.getElementById("change").value;
			if(window.XMLHttpRequest){
				var xHttp = new XMLHttpRequest();	
			}else{
				var xHttp = new ActiveXObject("Microsoft.XMLHTTP");	
			}
			//xHttp.open("GET","php/dochange.php?clumn="+changeValue);
			xHttp.open("GET","state/dochange.php?clumn="+changeValue+"&page="+page);
			xHttp.send();
			xHttp.onreadystatechange = function(){
				if(xHttp.readyState==4 && xHttp.status==200){
					document.getElementById("cont").innerHTML = xHttp.responseText;
				}	
			}	
		}

	</script>
	<ul class="breadcrumb">
		<li><a href="index.php">首页</a></li>
		<li><a href="webzixun.php">分享资讯</a></li>
		<li>分享查询</li>
	</ul>
	
	<!--下拉-->
		<div class="dropdown">
	  <div class="dropdown projects-header page-header">
      
      <select class="form-control" style="width:230px" id="change" onChange="change(0)">
      	  <option>全部内容</option>
          <option>去哪儿网</option>
          <option>携程旅游</option>
          <option>同程旅游</option>
          <option>蜜蜂旅游</option>
        </select>
      
   	 </div>
	<div id="cont">

	</div>
<script type="text/javascript">
	change();
</script>
	<!--footer-->   
	<?php
		include 'footer.php';	
	?>
