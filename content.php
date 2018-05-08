<?php
	include 'header.php';
	include './state/sql.php';
	
	if(empty($_GET['id'])){
		$sql = "SELECT * FROM ht_fabu";
	}else{
		$id=$_GET['id'];
		$sql = "SELECT * FROM ht_fabu WHERE ht_id='$id'";
	}
	$result=$conn->query($sql);
	$f = $result->fetch_assoc();
	
?>
		
	<ul class="breadcrumb">
		<li><a href="index.php">首页</a></li>
		<li><a href="webzixun.php?column=<?php echo $f['ht_column'];?>"><?php echo $f['ht_column'];?></a></li>
		<li><?php echo $f['ht_title'];?></li>
	</ul>
	<div class="text-center">
		<h1><?php echo $f['ht_title'];?></h1>
		<span>作者:<?php echo $f['ht_name'];?></span>
		<span>发布日期:<?php  date_default_timezone_set('UTC'); echo date('Y-m-d H:i:s',$f['ht_date']);?></span>
	</div>
	<hr />
	<?php echo $f['ht_content'];?>
	<p class="content"></p>
	<!--相关文章-->
	
	<div class="bs-example" data-example-id="bordered-table">
    <table class="table table-bordered">
      <thead class="bg-success text-success">
        <tr>
   
          <td>相关文章</td>
       
        </tr>
      </thead>
      <tbody>
        <tr>
         
          <td><span class="glyphicon glyphicon glyphicon-star-empty"></span><span> 分享内容</span></td>
     
        </tr>
        <tr>
        
          <td><span class="glyphicon glyphicon glyphicon-star-empty"></span><span>分享内容</span></td>
   
        </tr>
        <tr>
       
          <td><span class="glyphicon glyphicon glyphicon-star-empty"></span><span> 分享内容</span></td>
    
        </tr>
         <tr>
       
          <td><span class="glyphicon glyphicon glyphicon-star-empty"></span><span> 分享内容</span></td>
    
        </tr>
      </tbody>
    </table>
  </div>
	<!--footer-->
		<?php
			include 'footer.php';
		?>