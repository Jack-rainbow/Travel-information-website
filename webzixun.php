<?php
	include 'header.php';
	include './state/sql.php';
/*  通过column获取到传过来的当前列 通过sql语句获取 $sql='SELECT * FROM ht_fabu By ht_column'
 *  然后页面中获取get['column'],但是跳转页面必须传参数
 * （接下来进行进行判断 如果有column就 获取到当前的column 
 *  然后使用sql语句进行查询把当前column下边的  title全部显示出来,同时给每页限制显示条数，进行判断分页）
 *  用这个column /条数 =分页 并且 在单击上一页的时候或者单击下一页的时候可以单击
 * 	当到达第一页 或者最后一页的时候可以用$pages进行判断（如果$pages==1 或者$pages==总页数的时候就给他class里边加 disabled 不可以单击）
 * */




	if( empty($_GET['column']) )
	{
		$column = '全部内容';
	}
	else
	{
		$column = $_GET['column'];
	};
	
	if( empty($_GET['page']) )
	{
		$pages = 1;
	}
	else
	{
		$pages = $_GET['page'];
	};
	
		$pageSize = 8;//每页显示的条数
	
		$pageStart = ($pages-1)*$pageSize;//
	if( $column == '全部内容' )
	{
		//$sql = "SELECT * FROM ht_fabu ORDER BY ht_id LIMIT $pageStart,$pageSize";
		$sql = "SELECT * FROM ht_fabu ORDER BY ht_date ASC LIMIT 15";
		$sqlTotal = "SELECT * FROM ht_fabu";
	}
	else
	{
		$sql = "SELECT * FROM ht_fabu WHERE ht_column='$column' ORDER BY ht_id LIMIT $pageStart,$pageSize";
		$sqlTotal = "SELECT * FROM ht_fabu WHERE ht_column='$column' ORDER BY ht_id";
	};
	$result = $conn->query($sql);//执行sql语句
	$resultTotal = $conn->query($sqlTotal);//执行sql语句
	
	$pageNum = ceil($resultTotal->num_rows/$pageSize); //条目的长度/每页显示 的条数 =几页(求出一共多少页)
?>
			<ul class="breadcrumb">
				<li>
					<a href="index.php">首页</a>
				</li>
				<li class="active"><?php echo $column; ?></li>
			</ul>
			<br />
			<div>
				<h1 class="h1"><?php echo $column; ?></h1>
				<hr />
			</div>
			<div>
				<?php	
				$q=0;	
				
				$result=$conn->query($sql);
				if($result->num_rows>0)
				{
					while($f=$result->fetch_assoc()){
						$q++;
				?>
				<div>
					<span class="push-left"><a href="content.php?id=<?php echo $f['ht_id']?>"><?php echo mb_substr($f['ht_title'],0,50,'utf8');?></a></span>
					<span class="pull-right"><?php   date_default_timezone_set('UTC');echo date('Y-m-d H:i',$f['ht_date']);?></span>
				</div>
				<?php
						if($q%5==0){
							echo '<br>';
						}
					}
				} else
				 {
					echo '此栏目下没有文章';
				 };
				?>
			</div>
			<!--翻页-->
			<div class="text-center">
			<nav aria-label="Page navigation">
				  <ul class="pagination">
				    <li>
				      <a href="webzixun.php?column=<?php echo  $column;?>&page=<?php echo  $pages-1;?>"  class="<?php if(1==$pages) echo 'btn disabled' ?>"  aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <?php
				   for($i=1;$i<=$pageNum;$i++){
				    ?>
				    <li><a href="webzixun.php?column=<?php echo  $column;?>&page=<?php echo  $i;?>"><?php echo  $i;?></a></li>
					<?php 
					  }	
					?>
				    <li>
				      <a href="webzixun.php?column=<?php echo  $column;?>&page=<?php echo $pages+1;?>"   class="<?php if($pageNum==$pages) echo 'btn disabled' ?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
			<!--login-->
			<!--footer-->
		<?php
			include 'footer.php';
		?>