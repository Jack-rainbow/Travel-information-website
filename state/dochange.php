<?php
	include 'sql.php';
	$page=8;//当前页面显示的条数
	$pages=12;//当前页面中没有获取到clumn时显示12条数据
	$clumn=$_GET["clumn"];//value值
	$pageS=$_GET["page"];//当前第几页
	$pageStart=$page*$pageS;//求出开始页数
	if($clumn=="全部内容"){
		$sql="SELECT * FROM ht_fabu limit $pageStart, $pages";
		$ssql = "select * from ht_fabu order by ht_id"; // 获取总条数
	}else{
		$sql="SELECT * FROM ht_fabu WHERE ht_column='$clumn' limit $pageStart, $page";
		$ssql = "select * from ht_fabu  WHERE ht_column='$clumn' order by ht_id"; // 获取总条数
	}
	$result = $conn->query($sql);
	$sresult = $conn->query($ssql);
	//获取到一共有多少页===获取到column的总条数除以当前页面所显示的条数 那么就是页数
	$sumPage=ceil($sresult->num_rows/$page);//
	
?>
	<!--图片-->
	<div class="row">
		<?php
			if($result->num_rows>0){
				while($f=$result->fetch_assoc()){
		?>	
		<div class="col-md-3 col-sm-3">
			<div class="thumbnail" >
				<a href="content.php?id=<?php echo $f['ht_id'];?>"><img src="<?php echo $f['ht_thumbanil'];?>" alt="" /></a>
		</div>
		
		</div>
		<?php
							
			}
		}	
		?>
	
	</div>
	<!--左右按钮-->
      <ul class="pager">
        <li class="previous"><a href="javascript:change(<?php if($pageS<=0){
        	echo 0;
        }else{
        	$pageS-1;
        }?>);">&larr; Older</a></li>
   		<!--$sumPage-1==获取到的页数是(因为从下标0开始的 而页码是从1 开始的所以要-1);  -->
        <li class="next"><a href="javascript:change(<?php if($pageS==$sumPage-1){
        
        	echo $sumPage-1;	
        }else{
        	echo $pageS+1;
        }?>);">Newer &rarr;</a></li>
      </ul>