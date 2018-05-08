<?php
	include 'header.php';
	include 'state/sql.php';
	$sql = "SELECT * from ht_fabu WHERE ht_column='Web前端开发' limit 0,4";
	$sql1 = "SELECT * from ht_fabu WHERE ht_column='JAVA开发' limit 0,4";
	$sql2 = "SELECT * from ht_fabu WHERE ht_column='PHP开发' limit 0,4";
	$sql3 = "SELECT * from ht_fabu WHERE ht_column='网络营销' limit 0,4";
	$sql4 = "SELECT * from ht_fabu WHERE ht_column='UI开发' limit 0,4";
	$result=$conn->query($sql);
	$result1=$conn->query($sql1);
	$result2=$conn->query($sql2);
	$result3=$conn->query($sql3);
	$result4=$conn->query($sql4);
?>
	<ul class="breadcrumb">
		<li><a href="index.php">首页</a></li>
		<li>分享资讯</li>
	</ul>
	<!--标签组-->
	 <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
            	
                <li class="list-group-item list-group-item-success">
                	<span class="glyphicon  glyphicon-user"></span><?php echo '去哪儿网';?>
                </li>
                <?php  if($result->num_rows>0){while($f=$result->fetch_assoc()){?>
                <a href="content.php?id="<?php $f['ht_id'];?>"  class="list-group-item"><?php echo mb_substr($f['ht_title'],0,30,'utf8');?></a>
           
            	<?php	
            			}
            		}else{
            	?>
            				
            		<a class="list-group-item"><?php echo "没有查询到数据";?></a>
            	<?php
            		}
            	?>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">
                <span class="glyphicon glyphicon-list-alt"></span> <?php echo "携程旅游";?></li>
                <?php
            		if($result1->num_rows>0){
            			while($f=$result1->fetch_assoc()){
            		
            	?>
                <a href="content.php?id="<?php $f['ht_id'];?>"  class="list-group-item"><?php echo mb_substr($f['ht_title'],0,30,'utf8');?></a>
           <?php	
            			}
            		}else{
            	?>
            				
            		<a class="list-group-item"><?php echo "没有查询到数据";?></a>
            	<?php
            		}
            	?>
            </ul>
        </div><div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item list-group-item-warning">
                <span class="glyphicon glyphicon-list"></span><?php echo "同程旅游";?>
                </li>
                <?php
            		if($result2->num_rows>0){
            			while($f=$result2->fetch_assoc()){
            		
            	?>
                <a href="content.php?id="<?php $f['ht_id'];?>"  class="list-group-item"><?php echo mb_substr($f['ht_title'],0,30,'utf8');?></a>
           
            	<?php	
            			}
            		}
            	?>
            </ul>
        </div><div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item list-group-item-danger">
                <span class="glyphicon glyphicon-tags"></span> <?php echo "蜜蜂旅游";?></li>
                <?php
            		if($result3->num_rows>0){
            			while($f=$result3->fetch_assoc()){
            		
            	?>
                <a href="content.php?id="<?php $f['ht_id'];?>"  class="list-group-item"><?php echo mb_substr($f['ht_title'],0,30,'utf8');?></a>
           
            	<?php	
            			}
            		}
            	?>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">
                <span class="glyphicon glyphicon-align-left"></span> <?php echo '携程旅游';?></li>
                <?php
            		if($result4->num_rows>0){
            			while($f=$result4->fetch_assoc()){
            		
            	?>
                <a href="content.php?id="<?php $f['ht_id'];?>"  class="list-group-item"><?php echo mb_substr($f['ht_title'],0,30,'utf8');?></a>
           
            	<?php	
            			}
            		}
            	?>
            </ul>
        </div>
    </div>
	<!--左右按钮-->
	
	<!--footer--> 
<?php
	include 'footer.php';
	
?>
