<?php
	include 'head.php';
	include 'sql.php';
	$column=$_GET['column'];
?>
<table class="table">
	<tr>
		<th>id</th>
		<th>文章标题</th>
		<th>发布日期</th>
		<th>操作</th>
	</tr>
	<?php
	
	
	
	if( empty($_GET['column']))
	{
		$sql = "SELECT * FROM ht_fabu";
	}
	else
	{
		$sql = "SELECT * FROM ht_fabu WHERE ht_column='$column'";//获取地址栏的参数必须加单引号
	};
		$result = $conn -> query($sql);
    	if($result->num_rows>0){
		while($f = $result->fetch_assoc())
		{
	?>
		<tr>
			<td><?php echo $f['ht_id']; ?></td>
			<td><?php echo mb_substr($f['ht_title'], 0, 35, 'utf8'); ?></td>
			<td><?php date_default_timezone_set('UTC');echo date('Y-m-d H:i:s', $f['ht_date']);?>
			
		</td>
		<td><a href="delete.php?id=<?php echo $f['ht_id']; ?>">删除</a>
	
		<a href="edit.php?id=<?php echo $f['ht_id']; ?>">修改</a>
		</td>
		</tr>
	<?php
		}
		}
	?>
</table>
</div>
</div>
<?php 
	include '../footer.php';	
?>