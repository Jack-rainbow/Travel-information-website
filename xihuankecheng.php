<?php
	include 'header.php';
	$result = file_get_contents('state/vote.txt');
	$voteArr = explode('---',$result);
	$voteSum=$voteArr[0]+$voteArr[1]+$voteArr[2]+$voteArr[3]/* +$voteArr[4]+$voteArr[5]+$voteArr[6] */;//投票总数
	$pccg = round(($voteArr[0]/$voteSum)*100);
	$webcg = round(($voteArr[1]/$voteSum)*100);
	$js = round(($voteArr[2]/$voteSum)*100);
	$jq = round(($voteArr[3]/$voteSum)*100);
	// $bootstrap = round(($voteArr[4]/$voteSum)*100);
	// $angular = round(($voteArr[5]/$voteSum)*100);
	// $webc = round(($voteArr[6]/$voteSum)*100);

/*	include 'state/sql.php';
	$sql="SELECT * FROM vote";
	$result=$conn->query($sql);	*/
?>
	<ul class="breadcrumb">
		<li><a href="index.php">首页</a></li>
		<li>投票</li>
	</ul>
	<br />
	<!--标签组-->
	<div>
		<h3 class="h3">请选择你喜欢的课程</h3>
		<h6>你觉得你喜欢以下哪个内容，请选择<h6>
		<hr />
	</div>
	<div>
	
		<div id="vote">
 
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
        去哪儿网
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
        携程旅游
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios3" value="3">
        同程旅游
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios4" value="4">
        蜜蜂旅游
      </label>
    </div>
    <!-- <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios5" value="5">
        不知道了2
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios5" value="6">
        不知道了3
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios5" value="7">
        不知道了4
      </label>
    </div> -->
    <input type="submit" value="投票" class="btn btn-success" id="vote">
    </div>
	</div>
	<div id='div1'>
		<h3 class="h3">各个科目受欢迎的百分比</h3>
		<h6>此数据来自<?php echo $voteSum;?>份用户投票结果<h6>
		<hr />
		<div>
		<div class="h3">去哪儿网(<?php echo $pccg;?>%)</div>
		<div class="progress">
			<div   class="progress-bar progress-bar-striped active" role="progressbar" style="width:<?php echo  $pccg;?>%;"><?php echo  $pccg;?>%</div>
		</div>
		</div>
			<div>
		<div class="h3">携程旅游(<?php echo $webcg;?>%)</div>
		<div class="progress">
			<div  class="progress-bar progress-bar-success progress-bar-striped active" style="width:<?php echo $webcg;?>%;"><?php echo $webcg;?>%</div>
		</div>
		</div>
			<div>
		<div class="h3">同程旅游(<?php echo $js;?>%)</div>
		
		<div class="progress">
			<div   class="progress-bar progress-bar-warning progress-bar-striped active" style="width:<?php echo $js;?>%;"><?php echo $js;?>%</div>
		</div>

		</div>

			<div>
		<div class="h3">蜜蜂旅游(<?php echo $jq;?>%)</div>
		<div class="progress">
			<div   class="progress-bar progress-bar-info progress-bar-striped active" style="width:<?php echo $jq;?>%;"><?php echo $jq;?>%</div>
		</div>
		</div>
			<!-- <div>
		<div class="h3">不知道了2(<?php echo $bootstrap;?>%)</div>
		<div class="progress">
			<div  class="progress-bar progress-bar-success progress-bar-striped active" style="width:<?php echo $bootstrap;?>%;"><?php echo $bootstrap;?>%</div>
		</div></div> -->
			<!-- <div>
		<div class="h3">不知道了3(<?php echo $angular;?>%)</div>
		<div class="progress">
			<div   class="progress-bar progress-bar-info progress-bar-striped active" style="width:<?php echo $angular;?>%;"><?php echo $angular;?>%</div>
		</div></div> -->
			<!-- <div>
		<div class="h3">不知道了4(<?php echo $webc;?>%)</div>
		<div class="progress">
			<div   class="progress-bar progress-bar-danger progress-bar-striped active" style="width:<?php echo $webc;?>%;"><?php echo $webc;?>%</div>
		</div></div> -->
	</div>
	<!--左右按钮-->
	
	<!--footer--> 
<?php
	include 'footer.php';	
?>

<script>

var aF = document.getElementsByName('optionsRadios');
var oBtn = document.getElementById('vote');
var oDiv = document.getElementById('div1');

oBtn.onclick = function()
{
	var v = '';
	for( var i=0;i<aF.length;i++ )
	{
		if( aF[i].checked )
		{
			var v =v+ aF[i].value;
		};
	};
	
	if(v == '')
	{
		alert("请投票！");
		return false;
	};
	ajax('state/vote3.php',v);
};


function ajax(url,num)
{
	if( window.XMLHttpRequest )
	{
		var Ajax = new window.XMLHttpRequest();
	}
	else
	{
		var Ajax = new ActiveXObject('Microsoft.XMLHTTP');
	};
	
	Ajax.open('get',url+'?num='+ num +'&t='+Math.random(),true);
	

	Ajax.send();
	
	Ajax.onreadystatechange = function()
	{
	
		if( Ajax.readyState == 4 && Ajax.status == 200 )
		{
			oDiv.innerHTML = Ajax.responseText;
		};
	};
};

</script>