<?php
session_start();
include 'sql.php';
$id=$_GET['id'];//接受一个ID 跳转页面中必须填写ID 否则跳转到的页面接受不到ID 会报ID错误
if($_SERVER['REQUEST_METHOD']=='POST')
{
	
	$title=$_POST['title'];
	$column=$_POST['column'];
	$describe=$_POST['describe'];
	$keyworld=$_POST['keyworld'];
	$editorValue=$_POST['editorValue']; 
	
	if(empty($_FILES['thumbnail']['name'])){
		$sql = "UPDATE ht_fabu SET ht_title='$title',ht_column='$column',ht_describe='$describe',ht_keyword='$keyworld',
				ht_content='$editorValue' WHERE ht_id=$id";
		if($conn->query($sql))
		{
			$srk = '修改文章成功';
			$jumpUrl = 'column.php';
			include '../tip.php';
			exit;
		}else{
			$srk = '修改文章失败';
			$jumpUrl = "edit.php?id=<?php echo $id;?>";
			include '../tip.php';
			exit;
		};
	}
	
	//1.
	if($_FILES['thumbnail']['error']>0){
		$srk = '上传错误';
		$jumpUrl = 'publish.php';
		include '../tip.php';
		exit;
	}
	//2.
	$fMaxSize = 1*1024*1024;
	$size=$_FILES['thumbnail']['size'];
	if($size>$fMaxSize){
		$srk = '文件内容过大';
		$jumpUrl = 'publish.php';
		include '../tip.php';
		exit;
	}
	//3.
	$imgarr=[
		'image/jpeg',
		'image/png',
		'image/gif',
		'image/png'
	];
	$pichz=$_FILES['thumbnail']['type'];
	if( !in_array($pichz, $imgarr)){
		$srk = '您上传的不是文件内容';
		$jumpUrl = 'publish.php';
		include '../tip.php';
		exit;
	}
	//4.
	//现将图片名字取出来 然后在取出他数组中的最后一位
	//并且使用毫秒数进行随机打乱 生成一个唯一的图片名字
	$filearr=explode('.', $_FILES['thumbnail']['name']);
	$fl=array_pop($filearr);
	date_default_timezone_set('UTC');
	$pic=date('YmdHis').rand(10000, 99999).'.'.$fl;
	//5.
	if(!move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../pic/'.$pic)){
		$srk = '上传失败';
		$jumpUrl = 'publish.php';
		include '../tip.php';
		exit;
	};
	$thumbnail='./pic/'.$pic;
	$sql = "UPDATE ht_fabu SET ht_title='$title',ht_column='$column',ht_describe='$describe',ht_keyword='$keyworld',
				ht_content='$editorValue',ht_thumbanil='$thumbnail' WHERE ht_id=$id";
	if($conn->query($sql))
	{
		$srk = '发布文章成功';
		$jumpUrl = 'column.php';
		include '../tip.php';
		exit;
	}else{
		//echo 'baocuo' . mysqli_error($conn);   报数据库错误       
		//如果数据库中传值时未设置''只会写数字，其他值不可以 写 要特别注意;
		$srk = '发布文章失败';
		$jumpUrl = 'publish.php';
		include '../tip.php';
		exit;
	};
}
else
{
	$srk = '修改错误';
	$jumpUrl = 'publish.php';
	include '../tip.php';
	exit;	
}
?>