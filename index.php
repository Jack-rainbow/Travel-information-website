<?php
	header('Content-type:text/html;charset=utf8');
	include 'header.php';
	include './state/sql.php';
?>

<!--web课程推荐-->
	<h2>旅游<span>博客</span></h2>
	<div>博客是社会媒体网络的一部分。</div>
	<hr />
	<!--pic-list-->
	<div class="row">
		<?php
		/*从数据中降序时间戳提出8条数据（降序）*/
		$sql = "SELECT * FROM ht_fabu ORDER BY ht_date DESC LIMIT 8";
		$result=$conn->query($sql);
		//var_dump($result) ;
		if($result->num_rows>0){
			while($f = $result->fetch_assoc())
			{	
		?>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="thumbnail" >
				<a href="webzixun.php?id=<?php echo $f['ht_id']?>" title="<?php echo $f['ht_title']?>">
				<img src="<?php echo $f['ht_thumbanil']?>"  alt="<?php echo $f['ht_title']?>"/>
				</a>
				<div class="caption">
					<h4><a href="webzixun.php" title="<?php echo $f['ht_title']?>"><?php echo mb_substr($f['ht_title'],0,18,'utf8');?></a></h4>
					 <p class="h5"><a href="webzixun.php?column=<?php echo $f['ht_column']; ?>" target="_blank"><?php echo $f['ht_column']; ?></a><p>
		           	 <p><?php echo mb_substr($f['ht_describe'],0,30,'utf8');?></p>
				</div>	
			</div>
		</div>
			<?php
					}
			}else{
				echo '查询到0条数据';
			}
			?>
		
	</div>
	<!-- 		<div id="">

			<h2>健康<span>俱乐部</span></h2>
			<div>滴滴滴</div>
			<hr />
			</div>
			//table
			<div class="table-responsive">
				
			</div> -->
	<!--footer-->
<?php
		include 'footer.php';
?>