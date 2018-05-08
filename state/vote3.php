<?php
$q = $_GET['num'];
$result = file_get_contents('vote.txt');
$voteArr = explode('---',$result);
/*$pc=$voteArr[0];
$web=$voteArr[1];
$js=$voteArr[2];
$jq=$voteArr[3];
$bt=$voteArr[4];
$an=$voteArr[5];
$h5=$voteArr[6];
*/
switch($q){
	case 1:
		$voteArr[0]=$voteArr[0]+1;
		break;
	case 2:
		$voteArr[1]=$voteArr[1]+1;
		break;
	case 3:
		$voteArr[2]=$voteArr[2]+1;
		break;
	case 4:
		$voteArr[3]=$voteArr[3]+1;
		break;
	// case 5:
	// 	$voteArr[4]=$voteArr[4]+1;
	// 	break;
	// case 6:
	// 	$voteArr[5]=$voteArr[5]+1;
	// 	break;
	// case 7:
	// 	$voteArr[6]=$voteArr[6]+1;
	// 	break;
}
	$voteSum=$voteArr[0]+$voteArr[1]+$voteArr[2]+$voteArr[3]/* +$voteArr[4]+$voteArr[5]+$voteArr[6] */;//投票总数
	$pccg = round(($voteArr[0]/$voteSum)*100);
	$webcg = round(($voteArr[1]/$voteSum)*100);
	$js = round(($voteArr[2]/$voteSum)*100);
	$jq = round(($voteArr[3]/$voteSum)*100);
	// $bootstrap = round(($voteArr[4]/$voteSum)*100);
	// $angular = round(($voteArr[5]/$voteSum)*100);
	// $webc = round(($voteArr[6]/$voteSum)*100);

	$voteNum=$voteArr[0].'---'.$voteArr[1].'---'.$voteArr[2].'---'.$voteArr[3]/* .'---'.$voteArr[4].'---'.$voteArr[5].'---'.$voteArr[6] */;
	file_put_contents('vote.txt', $voteNum);

?>
<div>
	<div>
		<h3 class="h3">各个科目受欢迎的百分比</h3>
		<h6>此数据来自<?php echo $voteSum;?>份用户投票结果<h6>
		<hr />
		<div>
		<div class="h3">去哪儿网(<?php echo $pccg;?>%)</div>
		<div class="progress">
			<div   class="progress-bar progress-bar-success progress-bar-striped  active
				<?php
			      	if(round(($pccg/$voteSum)*100,2)>=75){
						echo "progress-bar-success";	
					}elseif(round(($pccg/$voteSum)*100,2)<75 && round(($pccg/$voteSum)*100,2)>=50){
						echo "progress-bar-info";
					}elseif(round(($pccg/$voteSum)*100,2)<50 && round(($pccg/$voteSum)*100,2)>=25){
						echo "progress-bar-warning";
					}else{
						echo "progress-bar-danger";	
					}
				  ?>
				  role="progressbar"
				" style="width:<?php echo $pccg;?>%;"><?php echo $pccg;?>%</div>
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
		</div></div>

			<!-- <div>
		<div class="h3">健身1(<?php echo $bootstrap;?>%)</div>
		<div class="progress">
			<div  class="progress-bar progress-bar-success progress-bar-striped active" style="width:<?php echo $bootstrap;?>%;"><?php echo $bootstrap;?>%</div>
		</div></div>
			<div>
		<div class="h3">健身1(<?php echo $angular;?>%)</div>
		<div class="progress">
			<div   class="progress-bar progress-bar-info progress-bar-striped active" style="width:<?php echo $angular;?>%;"><?php echo $angular;?>%</div>
		</div></div>
			<div>
		<div class="h3">健身1(<?php echo $webc;?>%)</div>
		<div class="progress">
			<div   class="progress-bar progress-bar-danger progress-bar-striped active" style="width:<?php echo $webc;?>%;"><?php echo $webc;?>%</div>
		</div></div> -->